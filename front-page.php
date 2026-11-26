<?php get_header(); ?>
<main id="main-content" class="ccu-home">
  <section class="ccu-home-hero" aria-labelledby="ccu-home-title">
    <div class="ccu-wrap ccu-home-hero-grid">
      <div class="ccu-home-copy">
        <p class="ccu-eyebrow">Cape Town · South Africa</p>
        <?php ccu_logo('hero'); ?>
        <p class="ccu-home-kicker">COMMUNITY STARTS HERE</p>
        <h1 id="ccu-home-title">Your people.<br><em>Your community.</em></h1>
        <p class="ccu-home-lead">A simpler way to stay connected with Canna Cartel 420. Explore membership information, keep up with approved community activities and access your member account.</p>
        <div class="ccu-home-actions">
          <a class="ccu-btn" href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership <span aria-hidden="true">↗</span></a>
          <a class="ccu-btn ccu-btn--outline" href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">I’m already a member</a>
        </div>
        <p class="ccu-home-status"><span aria-hidden="true"></span> Membership registration is currently closed while final checks are completed.</p>
      </div>
      <div class="ccu-home-visual" role="img" aria-label="Abstract forest-green and gold Canna Cartel community artwork">
        <div class="ccu-visual-orbit ccu-visual-orbit--one"></div><div class="ccu-visual-orbit ccu-visual-orbit--two"></div>
        <div class="ccu-visual-mark">CC<span>420</span></div>
        <div class="ccu-home-image-caption"><span>01</span><span>Rooted in Cape Town. Connected by community.</span></div>
      </div>
    </div>
  </section>

  <section class="ccu-home-intro ccu-section--light" aria-labelledby="ccu-intro-title">
    <div class="ccu-wrap ccu-home-intro-inner">
      <div><p class="ccu-eyebrow ccu-eyebrow--green">A club built around people</p><h2 id="ccu-intro-title">Membership made <em>straightforward.</em></h2></div>
      <p>We’re creating one welcoming place for membership information, club news and community updates. No complicated online shop or checkout. Just the essentials, clearly explained.</p>
    </div>
  </section>

  <section class="ccu-home-benefits" aria-label="Membership features">
    <div class="ccu-wrap ccu-home-benefit-grid">
      <article class="ccu-home-benefit"><span class="ccu-home-icon" aria-hidden="true">01</span><h3>Your member space</h3><p>Access your account and view the membership information recorded for you.</p><a href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">Go to sign in <span aria-hidden="true">↗</span></a></article>
      <article class="ccu-home-benefit"><span class="ccu-home-icon" aria-hidden="true">02</span><h3>Club updates</h3><p>Keep up with announcements, approved activities and community news.</p><a href="<?php echo esc_url(ccu_url('/member-updates-and-competitions/')); ?>">View updates <span aria-hidden="true">↗</span></a></article>
      <article class="ccu-home-benefit"><span class="ccu-home-icon" aria-hidden="true">03</span><h3>Clear information</h3><p>Find helpful answers about membership, privacy and how the club works.</p><a href="<?php echo esc_url(ccu_url('/frequently-asked-questions/')); ?>">Read the FAQs <span aria-hidden="true">↗</span></a></article>
    </div>
  </section>

  <section class="ccu-home-journey" aria-labelledby="ccu-journey-title">
    <div class="ccu-wrap ccu-journey-grid">
      <div class="ccu-journey-heading"><p class="ccu-eyebrow">Your membership journey</p><h2 id="ccu-journey-title">Three simple <em>steps.</em></h2><p>When registration opens, the process will be clear from the start.</p><a class="ccu-btn ccu-btn--light" href="<?php echo esc_url(ccu_url('/membership/')); ?>">Membership information <span aria-hidden="true">↗</span></a></div>
      <div class="ccu-journey-steps">
        <article><span>01</span><div><h3>Explore</h3><p>Read the membership details, terms and privacy information before deciding.</p></div></article>
        <article><span>02</span><div><h3>Register and arrange payment</h3><p>When registration is available, follow the instructions. Payments are handled and verified separately by staff.</p></div></article>
        <article><span>03</span><div><h3>Access your account</h3><p>Once your membership is confirmed, use the member sign-in page to access your account.</p></div></article>
      </div>
    </div>
  </section>

  <section class="ccu-home-community" aria-labelledby="ccu-community-title">
    <div class="ccu-wrap ccu-community-grid">
      <div class="ccu-community-art" role="img" aria-label="Decorative Canna Cartel community artwork"><span>COMMUNITY</span><strong>Better<br>together.</strong><i>CANNA CARTEL 420 · CAPE TOWN</i></div>
      <div><p class="ccu-eyebrow ccu-eyebrow--green">Stay in the loop</p><h2 id="ccu-community-title">Good people. <em>Good energy.</em></h2><p>From club announcements to approved meet-ups, this is where members can stay informed and connected.</p><a class="ccu-text-link" href="<?php echo esc_url(ccu_url('/about/')); ?>">Get to know the club <span aria-hidden="true">↗</span></a></div>
    </div>
  </section>

  <section class="ccu-home-final" aria-labelledby="ccu-final-title">
    <div class="ccu-wrap ccu-final-panel">
      <div><p class="ccu-eyebrow">Your next step</p><h2 id="ccu-final-title">Want to know more?</h2><p>Explore the membership information or head straight to your member account.</p></div>
      <div class="ccu-final-actions"><a class="ccu-btn" href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership <span aria-hidden="true">↗</span></a><a class="ccu-btn ccu-btn--outline" href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">Member sign in</a></div>
    </div>
    <p class="ccu-home-disclaimer">Membership information only. Registration is currently closed. Payments are not processed on this website and no online checkout is available.</p>
  </section>
</main>
<?php get_footer(); ?>
