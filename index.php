<?php get_header(); ?>
<main id="main-content" class="ccu-page-main"><div class="ccu-wrap ccu-content-shell"><header class="ccu-page-heading"><h1><?php echo esc_html(is_home() ? 'Latest updates' : get_the_archive_title()); ?></h1></header>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="ccu-archive-post"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p><?php echo esc_html(get_the_date()); ?></p><?php the_excerpt(); ?></article>
<?php endwhile; the_posts_pagination(); else : ?><p>No posts have been published yet.</p><?php endif; ?>
</div></main>
<?php get_footer(); ?>
