# Canna Cartel 420 — Unified GitHub Starter

**WordPress theme + read-only WordPress-to-Base44 content bridge + brand assets.**

Website: https://www.shopcannacartel.co.za/  
Existing Base44 app: https://app.base44.com/apps/6af928cd33f228f2839ecd4f/editor/preview  
Supabase project: `canna-cartel-membership` (`eslbggkkzgvvlunkpwft`)

## What's included

```
canna-cartel-github-kit/
├── wordpress/
│   ├── themes/canna-cartel-unified/       # Custom responsive WordPress theme
│   ├── plugins/canna-cartel-bridge/       # Public JSON for brand + approved updates
│   └── wp-config.example.php              # OPTIONAL; no secrets stored
├── integrations/
│   ├── base44/WordPressUpdates.jsx        # Drop-in read-only Updates card
│   └── supabase/README.md                 # Preserve existing membership tables
├── preview/index.html                     # Browser design preview (no PHP backend)
├── docs/                                 # Installation, branding, security/sync map, QA
├── scripts/verify.mjs
└── .github/workflows/validate.yml
```

## Quick start

1. Upload this folder's contents to your GitHub repository (or commit with Git).
2. Open `preview/index.html` in your browser for the proposed design.
3. Run `npm run verify` (Node 18+; PHP 8+ for PHP lint).
4. Follow **[docs/INSTALL.md](docs/INSTALL.md)** to install the theme + plugin on **staging**, or configure the optional manual GitHub Actions staging deploy.
5. Set the official unchanged logo through WordPress Site Identity.
6. Copy the Base44 component into your existing app and verify the real REST endpoint.

## What IS / IS NOT synchronised

- ✅ Repository contains the same palette and photo assets that can be applied to WordPress and Base44.
- ✅ Once WordPress bridge is installed, Base44 can **read the current approved WordPress announcements**, by HTTP GET.
- ✅ An optional GitHub Actions workflow can upload the theme and plugin to an SSH-enabled WordPress **staging** host once deploy secrets are configured.
- ❌ Uploading code to GitHub alone does not change the production website.
- ❌ This kit does not sync member accounts or payment records; the live Supabase project currently contains two different membership schemas with no verified mapping. Those remain untouched.
- ❌ No logo was fabricated. You must upload the exact original logo asset.
- ❌ This kit does not turn the shop or registration live.

See [docs/SYNC-MAP.md](docs/SYNC-MAP.md) for the authoritative source and trigger for each exchange.

### Security

No API tokens, passwords or production credentials are checked in. The plugin uses read-only public endpoints by default. An optional server-side member status lookup is disabled by default. Do **not** enable until user identity mapping and security have been independently verified.

### Existing WordPress pages preserved

The theme links to observed routes such as `/membership/`, `/member-sign-in/`, `/frequently-asked-questions/` and `/member-updates-and-competitions/`. The account/login behavior is owned by the **existing** WordPress plugins/pages, not replaced by this kit.


## Vercel landing-page mirror

The `vercel/` directory contains a standalone, responsive static landing page that follows the same forest-green, leaf-green, gold and ivory visual system as the WordPress homepage. The root `vercel.json` serves that directory as the Vercel output; no PHP or WordPress runtime is required for this mirror.

The Vercel page is a visual/public-information front end only. Membership information, member sign-in, account records and manual payment verification remain on the WordPress site at https://www.shopcannacartel.co.za/. It does not create a second member database or process payments.

For automatic updates, connect this GitHub repository's `main` branch to the existing Vercel project. A push to `main` will then trigger a deployment if Git integration is enabled. The GitHub commit alone does not confirm that a Vercel deployment has completed.
