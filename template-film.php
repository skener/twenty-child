<?php
/*Template Name: Film*/
get_header();
query_posts(array(
                'post_type' => 'film'
            )); ?>
<?php
while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<?php endwhile;
get_footer();