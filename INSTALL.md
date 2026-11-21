# Install instructions

## A. Add to your GitHub repository

Upload the **contents** of the top-level `canna-cartel-github-kit` folder to your GitHub repo root. A GitHub upload does **not** deploy PHP to your WordPress host.

## B. Review the preview

Open `preview/index.html` locally. This is a static design preview. It cannot run WordPress PHP or sign users in.

## C. Install the WordPress theme on STAGING first

1. Back up your theme and WordPress database.
2. Zip only the folder `wordpress/themes/canna-cartel-unified/` to produce `canna-cartel-unified.zip`.
3. WordPress admin → Appearance → Themes → Add New → Upload Theme → upload the theme zip.
4. Activate **on staging** after testing. This theme is a classic PHP theme and uses your existing WordPress pages, membership forms and URL routes.
5. WordPress admin → Appearance → Customize → Site Identity → Logo: upload your **approved, unedited original Canna Cartel logo**. Also set **Site Icon** from the approved source asset (use a properly sized approved icon). The kit deliberately does not invent or redraw a logo.
6. Appearance → Menus: assign your existing menu to `Primary navigation`. Fallback links use existing observed routes, but `/about/`, `/shop/`, and `/help-and-contact/` must be checked against your exact slugs.
7. Homepage: the `front-page.php` template renders when this theme is active; do not delete your existing homepage.

If your host does not provide staging, test using a clone/local WordPress installation first. Do not activate the theme directly on production before checking your membership plugin UI and forms.

## D. Install the read-only WordPress bridge

1. Zip only `wordpress/plugins/canna-cartel-bridge/` to produce `canna-cartel-bridge.zip`.
2. WordPress admin → Plugins → Add New → Upload Plugin → Activate.
3. Confirm the URLs in `docs/SYNC-MAP.md`.
4. Publish a real approved WordPress post with tag `club-update` to feed Base44.
5. The plugin does **not** make the WordPress member records match the Base44 accounts automatically. That is intentionally on hold pending verification.

## E. Use in Base44

See `integrations/base44/README.md`. Paste the update component into the existing app in the builder; connect the CSS tokens or adapt the typography without replacing the original logo. Do not paste server keys into Base44 frontend code.

## F. Release

Only after testing on staging, approve theme deployment and plugin activation on production; then perform post-release link checks, login smoke tests and clear caches if needed. See `docs/QA.md`.

## G. Optional GitHub → WordPress staging deployment

The repository contains `.github/workflows/deploy-staging.yml` as a **manual** workflow. It does nothing until you configure these GitHub repository secrets for a staging host that supports SSH:

- `WP_STAGING_SSH_HOST` — SSH hostname.
- `WP_STAGING_SSH_USER` — SSH username.
- `WP_STAGING_SSH_PRIVATE_KEY` — deploy-only private SSH key.
- `WP_STAGING_SSH_KNOWN_HOSTS` — verified SSH host-key line (obtain and verify separately).
- `WP_STAGING_WP_CONTENT_PATH` — absolute path to staging `wp-content`, without trailing slash.
- `WP_STAGING_SSH_PORT` — SSH port; optional, defaults to 22.

Open GitHub → Actions → **Deploy Canna Cartel to staging** → Run workflow and type `DEPLOY_STAGING` to confirm. It uploads only the theme and bridge plugin files; it does not activate either, alter content, publish registrations or touch member data. WordPress production deployment is intentionally separate.
