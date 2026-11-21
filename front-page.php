<?php get_header(); ?>
<main id="main-content">
  <section class="ccu-hero" aria-labelledby="ccu-hero-title">
    <div class="ccu-wrap ccu-hero-grid">
      <div class="ccu-hero-copy">
        <p class="ccu-eyebrow">Canna Cartel 420 · Cape Town</p>
        <div class="ccu-hero-brand"><?php ccu_logo('hero'); ?></div>
        <h1 id="ccu-hero-title">Welcome to <em>the club.</em></h1>
        <p class="ccu-lead">A community-first membership experience. Stay connected with club news, discover approved activities and manage your membership simply.</p>
        <div class="ccu-actions">
          <a class="ccu-btn" href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership <span aria-hidden="true">↗</span></a>
          <a class="ccu-btn ccu-btn--outline" href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">Member sign in</a>
        </div>
        <div class="ccu-notice" role="note"><span class="ccu-notice-dot" aria-hidden="true"></span> Registration will open after final terms, privacy and security checks.</div>
      </div>
      <div class="ccu-hero-photo">
        <picture>
          <source media="(max-width: 720px)" srcset="<?php echo esc_url(ccu_asset('cape_town_community_mobile.webp')); ?>" type="image/webp">
          <img src="<?php echo esc_url(ccu_asset('cape_town_community_desktop.webp')); ?>" alt="Cape Town city streets and mountain backdrop" width="1260" height="920" loading="eager" decoding="async" fetchpriority="high">
        </picture>
        <div class="ccu-photo-tag">Rooted in Cape Town. Built for community.</div>
      </div>
    </div>
  </section>

  <section class="ccu-section ccu-section--light" aria-labelledby="ccu-experience-title">
    <div class="ccu-wrap">
      <p class="ccu-eyebrow ccu-eyebrow--green">The Canna Cartel experience</p>
      <h2 id="ccu-experience-title">Your community. <em>One place.</em></h2>
      <p class="ccu-intro">A straightforward membership platform first — not a complicated online store.</p>
      <div class="ccu-cards">
        <article class="ccu-card"><span class="ccu-card-number">01 / Membership</span><h3>Join the club</h3><p>Explore membership, account information and simple steps for joining when registration opens.</p><a href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership <span aria-hidden="true">↗</span></a></article>
        <article class="ccu-card"><span class="ccu-card-number">02 / Community</span><h3>Events & activities</h3><p>Follow announcements about approved club activities as dates and participation details are confirmed.</p><a href="<?php echo esc_url(ccu_url('/member-updates-and-competitions/')); ?>">See updates <span aria-hidden="true">↗</span></a></article>
        <article class="ccu-card"><span class="ccu-card-number">03 / Education</span><h3>Know more</h3><p>Find balanced, easy-to-follow information about cannabis terminology, responsible choices and club FAQs.</p><a href="<?php echo esc_url(ccu_url('/frequently-asked-questions/')); ?>">Explore FAQs <span aria-hidden="true">↗</span></a></article>
      </div>
    </div>
  </section>

  <section class="ccu-section ccu-section--story" aria-labelledby="ccu-story-title">
    <div class="ccu-wrap ccu-story-grid">
      <picture>
        <source media="(max-width: 720px)" srcset="<?php echo esc_url(ccu_asset('cartel_community_walk_mobile.webp')); ?>" type="image/webp">
        <img src="<?php echo esc_url(ccu_asset('cartel_community_walk_desktop.webp')); ?>" alt="Friends walking together through a neighbourhood" width="1260" height="920" loading="lazy" decoding="async">
      </picture>
      <div><p class="ccu-eyebrow">People first</p><h2 id="ccu-story-title">More than a <em>membership card.</em></h2><p>A comfortable place to keep track of your community, your club updates and your membership information — with clear choices about optional messages.</p><a class="ccu-btn ccu-btn--light" href="<?php echo esc_url(ccu_url('/about/')); ?>">Our story <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>

  <section class="ccu-section ccu-section--light" aria-labelledby="ccu-how-title">
    <div class="ccu-wrap">
      <p class="ccu-eyebrow ccu-eyebrow--green">Simple steps</p><h2 id="ccu-how-title">How membership works.</h2>
      <div class="ccu-steps">
        <div><span>01</span><h3>Discover</h3><p>Review the membership terms and pricing when registration opens.</p></div>
        <div><span>02</span><h3>Pay separately</h3><p>Staff independently confirm manual payments. There is no website checkout.</p></div>
        <div><span>03</span><h3>Stay connected</h3><p>Sign in to view recorded membership information and approved updates.</p></div>
      </div>
      <div class="ccu-callout"><div><p class="ccu-eyebrow ccu-eyebrow--green">Coming later</p><h3>Still in Harvest.</h3><p>Our online shop is being prepared. Online orders, payment and checkout are not active.</p></div><a class="ccu-btn" href="<?php echo esc_url(ccu_url('/shop/')); ?>">Shop update <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
