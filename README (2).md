# Base44 component: read published WordPress updates

Copy `WordPressUpdates.jsx` into the **existing** Canna Cartel Base44 app, then import and render it in the desired page.

Example:

```jsx
import WordPressUpdates from './components/WordPressUpdates';

export default function NewsPage() {
  return <WordPressUpdates />;
}
```

This requires the WordPress plugin `canna-cartel-bridge` to be installed and activated. Verify `https://www.shopcannacartel.co.za/wp-json/canna/v1/updates`. WordPress posts tagged `club-update` appear in Base44 on the next page load. No scheduled synchroniser is required for this read-only presentation.

**Important:** Uploading the six supplied photos to the Base44 media library did **not** automatically place them on existing pages. Current Base44 plan does not permit direct sandbox file access, so the JSX is provided as a manual builder/code-integration step. Supabase is already connected to the existing app; this component does not migrate or change authentication.

The website must allow an anonymous cross-origin GET request from the Base44 deployment origin. Test in a real browser; the WordPress REST server or a security plugin may override CORS behavior. Never enable `Access-Control-Allow-Origin: *` on private member endpoints.
