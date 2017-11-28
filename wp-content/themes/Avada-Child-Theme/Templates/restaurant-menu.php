<?php
/**
 * Template Name: Restaurant Menu Template
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
							if (have_rows('menu_sections')) :
									while (have_rows('menu_sections')) : the_row(); ?>

									<h3><?php the_sub_field('section_title'); ?></h3>
									<?php while (have_rows('section_items')) : the_row(); ?>
											<div class="dish-name">name: <?php the_sub_field('dish_name'); ?></div>
											<div class="dish-description">description: <?php the_sub_field('dish_description'); ?></div>
											<div class="dish-price">price: : <?php the_sub_field('dish_price'); ?></div>

											<?php
											$image = get_sub_field('dish_image');
											if( !empty($image) ):
													// vars
													$url = $image['url'];
													$title = $image['title'];
													$alt = $image['alt'];
													$caption = $image['caption'];
													// thumbnail
													$size = 'thumbnail';
													$thumb = $image['sizes'][ $size ];
													$width = $image['sizes'][ $size . '-width' ];
													$height = $image['sizes'][ $size . '-height' ];

													if( $caption ): ?>
															<div class="wp-caption">
													<?php endif; ?>

													<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
															<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
													</a>

													<?php if( $caption ): ?>
																	<p class="wp-caption-text"><?php echo $caption; ?></p>
															</div>
													<?php endif; //end caption ?>
											<?php endif; //end image ?>

											<div style="padding-bottom: 20px;"></div>

									<?php endwhile; //end section items loop ?>
							<?php endwhile; endif; //end menu sections loop ?>
					</div>
					<!-- end post-content -->

			</div>
			<!-- end post-id -->

	  <?php endwhile; ?>
</section>

<?php get_footer();

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
