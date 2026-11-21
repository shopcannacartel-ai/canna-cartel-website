# Supabase: keep member data safe

Verified project: `canna-cartel-membership` (project reference `eslbggkkzgvvlunkpwft`).

**Do not run a schema migration simply to install this design kit.** The active project currently has TWO independent membership structures:

- `members` + `payments` + `marketing_consent_events` + `audit_events` — currently zero member rows; keyed to optional `wp_user_id`.
- `member_profiles` + `memberships` + `membership_audit_logs` — four profiles and four memberships; keyed to `base44_user_id`.

RLS is enabled, but seven exposed tables currently have **no RLS policies**. This can be intentional for trusted server-only use. It does NOT establish safe client access. Do not enable anonymous grants or create blanket `USING (true)` policies as a workaround.

Until staff identifies the canonical identity flow and approves a mapping between `wp_user_id`, `base44_user_id`, and profile IDs, avoid unifying user records, copying payments or activating the optional `my-membership` REST endpoint.

Safe planned ownership:

- **WordPress**: public pages and published announcements.
- **Supabase**: membership status and verified payments.
- **Base44**: customer-facing interface and, only when verified, an authorised view of member status.

Keep the Supabase secret or service role key on the WordPress server (via wp-config.php or environment variables), not in GitHub, React, or a public JavaScript bundle. `wp-config.example.php` shows configuration keys but is not a credential file. Review and enforce least-privilege RLS policies according to your actual authentication strategy before enabling browser database access.
