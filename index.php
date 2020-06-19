<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2 class="heading-size-3">Films:</h2>
                <table class="table table-hover" width="100%">
                    <tr>
                        <thead>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Genre</th>
                        <th>Country</th>
                        <th>Actors</th>
                        <th>Year</th>
                        <th>Extra Title Form</th>
                        <th>Extra Price Form</th>
                        <th>Extra Date Form</th>
                        </thead>
                    </tr>
                    <?php
                    $the_query = new WP_Query(
                        array(
                            'post_type' => 'film',
                            'posts_per_page' => -1,
                            //'meta_key' => 'film_date',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'genre',
                                    'terms' => 'genre',
                                ),
                                array(
                                    'taxonomy' => 'country',
                                    'terms' => 'country',
                                ),
                                array(
                                    'taxonomy' => 'actors',
                                    'terms' => 'actors',
                                ),
                                array(
                                    'taxonomy' => 'year',
                                    'terms' => 'year',
                                )
                            ),
                        )
                    );
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        ?>
                        <tr>
                            <td>
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </td>
                            <td>
                                <?php the_content(); ?>
                            </td>
                            <td>
                                <?php the_terms($post->ID, 'genre', ' '); ?>
                            </td>
                            <td>
                                <?php the_terms($post->ID, 'country', ' '); ?>
                            </td>
                            <td>
                                <?php the_terms($post->ID, 'genre', ' '); ?>
                            </td>
                            <td>
                                <?php the_terms($post->ID, 'year', ' '); ?>
                            </td>
                            <td>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'film_title', true)); ?>
                            </td>
                            <td>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'film_price', true)); ?>
                            </td>
                            <td>
                                <?php echo esc_html(get_post_meta(get_the_ID(), 'film_date', true)); ?>
                            </td>
                            </td>
                        </tr>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </table>
            </div>
        </div>
    </div>
<?php
get_footer();
