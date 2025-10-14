<?php
get_header();
?>
<section class="container content-area">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_type()); ?>
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
    <?php endwhile; ?>
</section>
<?php
get_footer();
