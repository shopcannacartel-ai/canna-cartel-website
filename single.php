<?php get_header(); ?>
<main id="main-content" class="ccu-page-main"><div class="ccu-wrap ccu-content-shell">
<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><header class="ccu-page-heading"><p class="ccu-eyebrow ccu-eyebrow--green"><?php echo esc_html(get_the_date()); ?></p><h1><?php the_title(); ?></h1></header><div class="ccu-page-content"><?php the_content(); ?></div></article>
<?php endwhile; ?>
</div></main>
<?php get_footer(); ?>
