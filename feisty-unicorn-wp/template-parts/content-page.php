<article id="post-<?php the_ID(); ?>" <?php post_class('content-card'); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(['before' => '<div class="page-links">' . __('Pages:', 'feisty-unicorn'), 'after' => '</div>']); ?>
    </div>
</article>
