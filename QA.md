# Deployment quality checklist

- [ ] Exact original Canna Cartel logo displays crisply in header and large hero; no filter/overlay applied.
- [ ] Theme uses existing live pages without removing membership forms or login handlers.
- [ ] Desktop at 1280px: menu, images and buttons fit; text has sufficient contrast.
- [ ] Mobile at 375px: menu toggle opens/closes, no horizontal scrolling, logo fully visible.
- [ ] FAQ / Membership / Sign In / My Account / Updates routes load correctly.
- [ ] New signup remains closed and no online checkout appears.
- [ ] Bridge health and brand endpoints return expected JSON.
- [ ] WordPress post tagged `club-update` appears in update API, then Base44 after refreshing; draft posts never appear.
- [ ] WP authenticated status lookup remains disabled until member identity mapping is confirmed.
- [ ] Supabase row-level security and WordPress secret handling reviewed separately.
- [ ] Cache bust / CDN clear after approval and production deployment.
- [ ] Run `npm run verify` and check CI status.

A local syntax check does not replace a real WordPress staging installation and an end-to-end login test.
