<?php
/**
 * Template Name: Beer Template
 * A full-width template.
 *
 * @package Avada
 * @subpackage Templates
 */
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>
<?php get_header(); ?>


<?php
				$args = array( 'post_type' => 'beers', 'posts_per_page' => 10 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<h3><?php the_field('beer_name'); ?></h3>
					<p>IBU: <?php the_field('ibu'); ?></p>
					<p>ABV: <?php the_field('abv'); ?></p>
					<p>Description: <?php the_field('beer_description'); ?></p>
					<p>Type: <?php the_field('beer_type'); ?></p>

					<!-- https://developer.wordpress.org/reference/functions/the_post_thumbnail/ -->
					<p>Image: <?php the_post_thumbnail( 'thumbnail' ); ?></p>


				<?php endwhile; ?>

<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
