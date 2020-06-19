<?php

get_header();

while (have_posts()) : the_post();

    the_title();
    the_terms($post->ID, 'country', ' ');
    the_terms($post->ID, 'actors', ' ');
    the_terms($post->ID, 'years', ' ');

endwhile;

get_footer();