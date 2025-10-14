<?php
/**
 * Front page template for Feisty Unicorn Coffee House.
 */

global $post;

get_header();

get_template_part('template-parts/section', 'hero');
get_template_part('template-parts/section', 'menu');
get_template_part('template-parts/section', 'about');
get_template_part('template-parts/section', 'pillars');
get_template_part('template-parts/section', 'showcase');
get_template_part('template-parts/section', 'supply');
get_template_part('template-parts/section', 'events');
get_template_part('template-parts/section', 'testimonials');
get_template_part('template-parts/section', 'arcade');

get_footer();
