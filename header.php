<?php if (!defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="ccu-skip" href="#main-content">Skip to content</a>
<div class="ccu-topbar"><div class="ccu-wrap"><span>Cape Town · South Africa</span><a href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership <span aria-hidden="true">↗</span></a></div></div>
<header class="ccu-header" role="banner">
  <div class="ccu-wrap ccu-header-inner">
    <?php ccu_logo(); ?>
    <button class="ccu-menu-toggle" type="button" aria-controls="ccu-site-nav" aria-expanded="false">Menu <span aria-hidden="true">☰</span></button>
    <nav id="ccu-site-nav" class="ccu-nav" aria-label="Primary">
      <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'ccu-menu', 'container' => false, 'fallback_cb' => 'ccu_navigation_fallback')); ?>
      <a class="ccu-btn ccu-btn--small" href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">Member sign in</a>
    </nav>
  </div>
</header>
