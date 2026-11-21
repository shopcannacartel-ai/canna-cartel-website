<?php if (!defined('ABSPATH')) { exit; } ?>
<footer class="ccu-footer">
  <div class="ccu-wrap ccu-footer-grid">
    <div><?php ccu_logo(); ?><p>Canna Cartel 420 is building a simple, welcoming membership community in Cape Town.</p></div>
    <div><h2>Membership</h2><a href="<?php echo esc_url(ccu_url('/membership/')); ?>">Explore membership</a><a href="<?php echo esc_url(ccu_url('/member-sign-in/')); ?>">Member sign in</a><a href="<?php echo esc_url(ccu_url('/help-and-contact/')); ?>">Help & contact</a></div>
    <div><h2>Explore</h2><a href="<?php echo esc_url(ccu_url('/frequently-asked-questions/')); ?>">Education & FAQ</a><a href="<?php echo esc_url(ccu_url('/member-updates-and-competitions/')); ?>">Updates</a><a href="<?php echo esc_url(ccu_url('/shop/')); ?>">Shop — still in harvest</a></div>
  </div>
  <div class="ccu-wrap ccu-footer-bottom"><span>© <?php echo esc_html(gmdate('Y')); ?> Canna Cartel 420.</span><span>Membership information only · No online checkout · Registration currently closed</span></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
