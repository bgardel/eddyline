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

<section id="content" <?php Avada()->layout->add_style( 'content_style' ); ?>>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php echo fusion_render_rich_snippets_for_pages(); // WPCS: XSS ok. ?>

							<div class="post-content">
									<?php the_content(); ?>
									<?php fusion_link_pages(); ?>

									<?php
									$args = array( 'post_type' => 'beers', 'posts_per_page' => 10 );
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); ?>

											<div class="col">
													<h3><?php the_field('beer_name'); ?></h3>
													<p>IBU: <?php the_field('ibu'); ?></p>
													<p>ABV: <?php the_field('abv'); ?></p>
													<p>Description: <?php the_field('beer_description'); ?></p>
													<p>Type: <?php the_field('beer_type'); ?></p>

													<?php // https://developer.wordpress.org/reference/functions/the_post_thumbnail/ ?>
													<p>Image: <?php the_post_thumbnail( 'thumbnail' ); ?></p>
				              </div>

										<?php endwhile; //end beers post type Loop ?>

							</div>
							<!-- end post-content -->

					</div>
					<!-- end post id -->

	  <?php endwhile; //end main the_post loop ?>
</section>

<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
