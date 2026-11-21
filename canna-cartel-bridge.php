<?php
/**
 * Plugin Name: Canna Cartel Public Bridge
 * Description: Read-only WordPress content/brand endpoints for the Canna Cartel Base44 app. Optional server-side member status lookup is disabled by default.
 * Version: 1.0.0
 * Requires PHP: 8.0
 * Author: Canna Cartel 420
 * Text Domain: canna-cartel-bridge
 */
if (!defined('ABSPATH')) { exit; }

/** REST endpoint behavior deliberately avoids writing user or payment records. */
add_action('rest_api_init', function () {
    register_rest_route('canna/v1', '/health', array('methods' => 'GET', 'callback' => 'ccb_health', 'permission_callback' => '__return_true'));
    register_rest_route('canna/v1', '/brand', array('methods' => 'GET', 'callback' => 'ccb_brand', 'permission_callback' => '__return_true'));
    register_rest_route('canna/v1', '/updates', array(
        'methods' => 'GET', 'callback' => 'ccb_updates', 'permission_callback' => '__return_true',
        'args' => array('per_page' => array('sanitize_callback' => 'absint'), 'page' => array('sanitize_callback' => 'absint'))
    ));
    register_rest_route('canna/v1', '/my-membership', array(
        'methods' => 'GET', 'callback' => 'ccb_my_membership', 'permission_callback' => function () { return is_user_logged_in() && current_user_can('read'); }
    ));
});
function ccb_health() {
    return rest_ensure_response(array('ok' => true, 'service' => 'canna-cartel-public-bridge', 'version' => '1.0.0'));
}
function ccb_brand() {
    $logo_id = (int) get_theme_mod('custom_logo', 0);
    $image_url = $logo_id ? wp_get_attachment_image_url($logo_id, 'full') : false;
    return rest_ensure_response(array(
        'name' => 'Canna Cartel 420', 'homepage' => home_url('/'),
        'logo_url' => $image_url ? esc_url_raw($image_url) : null,
        'registration_open' => defined('CCB_REGISTRATION_OPEN') && CCB_REGISTRATION_OPEN === true,
        'membership_fee_zar' => defined('CCB_MEMBERSHIP_PRICE_ZAR') ? max(0, (int) CCB_MEMBERSHIP_PRICE_ZAR) : 50,
        'palette' => array('forest' => '#073E24', 'leaf' => '#2A8E58', 'gold' => '#C9A34A', 'ivory' => '#F5F3EB'),
        'links' => array('membership' => home_url('/membership/'), 'sign_in' => home_url('/member-sign-in/'), 'faq' => home_url('/frequently-asked-questions/'), 'updates' => home_url('/member-updates-and-competitions/'))
    ));
}
function ccb_updates(WP_REST_Request $request) {
    $per_page = min(12, max(1, (int) ($request->get_param('per_page') ?: 6)));
    $page = max(1, (int) ($request->get_param('page') ?: 1));
    $posts = get_posts(array('post_type' => 'post', 'post_status' => 'publish', 'tag' => 'club-update', 'numberposts' => $per_page, 'paged' => $page, 'suppress_filters' => false));
    $records = array();
    foreach ($posts as $post) {
        $records[] = array(
            'id' => (int) $post->ID, 'title' => wp_strip_all_tags(get_the_title($post)),
            'summary' => wp_strip_all_tags(get_the_excerpt($post)),
            'url' => get_permalink($post), 'published_at' => get_post_time('c', true, $post),
            'image_url' => get_the_post_thumbnail_url($post, 'medium_large') ?: null
        );
    }
    return rest_ensure_response(array('source' => 'wordpress', 'items' => $records, 'page' => $page));
}
/**
 * Optional server-only lookup for the existing WordPress-linked Supabase members table.
 * Deliberately disabled until WP <-> Supabase identity mapping is confirmed.
 * Never accepts a user ID from the client and never writes to Supabase.
 */
function ccb_my_membership() {
    if (!defined('CCB_MEMBERSHIP_BRIDGE_ENABLED') || CCB_MEMBERSHIP_BRIDGE_ENABLED !== true) {
        return new WP_Error('bridge_disabled', 'Member status bridge is not configured.', array('status' => 503));
    }
    if (!defined('CCB_SUPABASE_URL') || !defined('CCB_SUPABASE_SECRET_KEY')) {
        return new WP_Error('bridge_unconfigured', 'Member status connection unavailable.', array('status' => 503));
    }
    $base = rtrim((string) CCB_SUPABASE_URL, '/');
    if (!wp_http_validate_url($base) || strpos($base, 'https://') !== 0) {
        return new WP_Error('bridge_url', 'Member status connection unavailable.', array('status' => 503));
    }
    $wp_user_id = get_current_user_id();
    $uri = add_query_arg(array(
        'select' => 'membership_status,paid_through_date,next_due_date',
        'wp_user_id' => 'eq.' . $wp_user_id,
        'limit' => '1'
    ), $base . '/rest/v1/members');
    $key = (string) CCB_SUPABASE_SECRET_KEY;
    $headers = array('apikey' => $key, 'Accept' => 'application/json');
    // Legacy JWT service-role keys need Authorization; sb_secret keys use only apikey.
    if (substr($key, 0, 3) === 'eyJ') { $headers['Authorization'] = 'Bearer ' . $key; }
    $res = wp_remote_get($uri, array('headers' => $headers, 'timeout' => 8, 'redirection' => 0));
    if (is_wp_error($res) || wp_remote_retrieve_response_code($res) !== 200) {
        return new WP_Error('bridge_unavailable', 'Member status could not be loaded.', array('status' => 503));
    }
    $records = json_decode(wp_remote_retrieve_body($res), true);
    if (!is_array($records) || count($records) === 0) {
        return new WP_Error('membership_not_linked', 'Account has not been linked to a membership record.', array('status' => 404));
    }
    $row = $records[0];
    $response = rest_ensure_response(array(
        'membership_status' => isset($row['membership_status']) ? sanitize_text_field((string) $row['membership_status']) : null,
        'paid_through_date' => isset($row['paid_through_date']) ? sanitize_text_field((string) $row['paid_through_date']) : null,
        'next_due_date' => isset($row['next_due_date']) ? sanitize_text_field((string) $row['next_due_date']) : null,
        'source' => 'supabase:members'
    ));
    $response->header('Cache-Control', 'private, no-store, max-age=0');
    return $response;
}
