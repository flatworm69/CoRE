<article id="post-<?php the_ID(); ?>" <?php post_class('content-card'); ?>>
    <header class="entry-header">
        <?php if (is_singular()) : ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php else : ?>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>
        <div class="entry-meta">
            <?php echo esc_html(get_the_date()); ?> · <?php esc_html_e('by', 'feisty-unicorn'); ?> <?php the_author(); ?>
        </div>
    </header>
    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'feisty-unicorn'),
                    ['span' => ['class' => []]]
                ),
                get_the_title()
            )
        );
        ?>
    </div>
    <footer class="entry-footer">
        <?php wp_link_pages(['before' => '<div class="page-links">' . __('Pages:', 'feisty-unicorn'), 'after' => '</div>']); ?>
        <?php the_tags('<div class="post-tags">', '', '</div>'); ?>
    </footer>
</article>
