/**
 * Copy this into the existing Base44 app and place <WordPressUpdates/> on a page.
 * It reads ONLY published, tagged posts from the WordPress public REST endpoint.
 * No login, database secret, member records or payment operations are involved.
 */
import React, { useEffect, useState } from 'react';

const ORIGIN = 'https://www.shopcannacartel.co.za';
const ENDPOINT = `${ORIGIN}/wp-json/canna/v1/updates?per_page=6`;
const BRAND_ENDPOINT = `${ORIGIN}/wp-json/canna/v1/brand`;

export default function WordPressUpdates() {
  const [items, setItems] = useState([]);
  const [brand, setBrand] = useState(null);
  const [status, setStatus] = useState('loading');
  useEffect(() => {
    const controller = new AbortController();
    fetch(BRAND_ENDPOINT, { signal: controller.signal, headers: { Accept: 'application/json' } })
      .then(response => { if (!response.ok) throw new Error('Brand unavailable'); return response.json(); })
      .then(setBrand)
      .catch(() => {}); // Updates still work even if branding endpoint is blocked.
    fetch(ENDPOINT, { signal: controller.signal, headers: { Accept: 'application/json' } })
      .then(response => { if (!response.ok) throw new Error('Unreachable'); return response.json(); })
      .then(data => { setItems(Array.isArray(data.items) ? data.items : []); setStatus('ready'); })
      .catch(err => { if (err.name !== 'AbortError') setStatus('error'); });
    return () => controller.abort();
  }, []);
  return (
    <section aria-labelledby="cc-updates-heading" style={{ padding: '40px 24px', borderRadius: 20, background: '#F5F3EB', color: '#14261E' }}>
      {brand?.logo_url && <img src={brand.logo_url} alt="Official Canna Cartel 420 logo" style={{ maxWidth: 210, width: '100%', height: 'auto', objectFit: 'contain', marginBottom: 18 }} />}
      <p style={{ color: '#176a42', fontWeight: 800, letterSpacing: '0.1em' }}>CARTEL COMMUNITY</p>
      <h2 id="cc-updates-heading" style={{ fontSize: 'clamp(1.8rem,4vw,3rem)', margin: '0 0 20px' }}>Latest club updates</h2>
      {status === 'loading' && <p role="status">Loading the latest news…</p>}
      {status === 'error' && <p role="status">Updates are temporarily unavailable. <a href={`${ORIGIN}/member-updates-and-competitions/`}>Visit the website</a>.</p>}
      {status === 'ready' && items.length === 0 && <p>There are no confirmed club updates to share yet.</p>}
      {status === 'ready' && items.length > 0 && (
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(min(100%, 260px), 1fr))', gap: 16 }}>
          {items.map(item => (
            <article key={item.id} style={{ background: '#fff', padding: 22, borderRadius: 14, border: '1px solid #DCE6D8' }}>
              <h3 style={{ fontSize: '1.2rem', margin: '0 0 10px' }}>{item.title}</h3>
              <p>{item.summary}</p>
              <a href={item.url} target="_blank" rel="noopener noreferrer" style={{ color: '#126c40', fontWeight: 750 }}>Read the announcement →</a>
            </article>
          ))}
        </div>
      )}
    </section>
  );
}
