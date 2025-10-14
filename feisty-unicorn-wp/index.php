<?php
/**
 * Default blog/index template.
 */

get_header();
?>
<section class="container content-area">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', get_post_type()); ?>
        <?php endwhile; ?>
        <?php the_posts_pagination(['mid_size' => 2]); ?>
    <?php else : ?>
        <p><?php esc_html_e('No content found. Create posts or pages to get started.', 'feisty-unicorn'); ?></p>
    <?php endif; ?>
</section>
<?php
get_footer();
