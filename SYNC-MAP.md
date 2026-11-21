# Data ownership and exchanges

| Data | Source of truth | Destination | Direction | Trigger | Current state |
|---|---|---|---|---|---|
| Approved logo | Approved original uploaded to WordPress Media | WP header, homepage, `brand` JSON; optional Base44 image | WordPress -> clients | Read/publish; separate upload if Base44 app needs local copy | Master original not present in kit |
| Shared brand tokens | Repository CSS/theme.json | WordPress theme; copied into Base44 UI code | GitHub -> deployment | Manual deploy/review | Implemented in repo, not deployed |
| Club announcements | Published WordPress posts tagged `club-update` | Base44 Updates component | WordPress -> Base44 | Live anonymous GET on page load | Code complete; install/verification pending |
| Member account details | Supabase canonical table TBD | WP private member page and/or Base44 | Supabase -> authenticated user only | Secure per-user read | BLOCKED: conflicting ID systems |
| Verified payment ledger | Supabase, staff verification | Member account | Read-only after auth | Event after manual staff verification | Not implemented in this kit |
| Optional marketing consent | Existing membership workflow | Appropriate notifications | Controlled, consent-based | Explicit consent event | Not modified |

## Public REST endpoints after plugin activation

- `GET /wp-json/canna/v1/health` returns an `ok` boolean.
- `GET /wp-json/canna/v1/brand` returns brand colors, logo URL (if WP logo is set), membership/navigation links, fee and registration flag.
- `GET /wp-json/canna/v1/updates` returns **published posts tagged `club-update`**. Empty until you tag and publish a real announcement.
- `GET /wp-json/canna/v1/my-membership` is **disabled** by default. Once an identity mapping is verified, it requires an authenticated WordPress session, a valid REST nonce when using cookie auth, and a server-held Supabase credential. It only reads records whose `wp_user_id` equals the current logged-in user. It never changes payments.

### Sync verification (after installation)

1. Open the health endpoint and confirm `ok: true`.
2. Open brand endpoint and confirm logo URL, colors and registration flag.
3. Publish a **test announcement** as a WP post with the exact tag `club-update` (first keep it private/draft until ready for public display).
4. Open updates endpoint and confirm its stable `id`, title, URL, published date.
5. Use Base44 component in preview and confirm that announcement displays; edit the WP post and refresh the app to confirm directionality.
6. Remove test content or unpublish it; check it disappears. Repeated reads must not write duplicates.
7. Do not run any personal member-data test before identity mapping and approval.

Public endpoint schema deliberately has no POST/PUT/DELETE routes. It uses WordPress's post IDs for stable identifiers; a browser read on refresh cannot create duplicates.
