<?php
/**
 *  The template for displaying about section in front page.
 *
 *  @package WordPress
 *  @subpackage illdy
 */
?>

<?php 

if( have_rows('home_page_about', 'option') ): 

	while( have_rows('home_page_about', 'option') ): the_row(); 

		$general_title = get_sub_field('home_page_about_title', 'option');
		$general_entry = get_sub_field('home_page_about_content', 'option');
		$general_image = get_sub_field('home_page_about_image', 'option');

	endwhile;
	
endif;

?>

<?php if ( '' != $general_title || '' != $general_entry || is_active_sidebar( 'front-page-about-sidebar' ) ) { ?>

<section id="about" class="front-page-section" style="<?php if ( ! $general_title && ! $general_entry ) : echo 'padding-top: 130px;';
endif; ?>">
	<?php if ( $general_title || $general_entry ) : ?>
		<div class="section-header">
			<div class="container">
				<div class="row">
					<?php if ( $general_image ) : ?>
						<div class="col-sm-12 col-md-6">
							<img src="<?php echo $general_image['url']; ?>" alt="<?php echo $general_image['alt']; ?>" />
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if ( $general_title ) : ?>
						<div class="col-sm-12 col-md-6">
							<h3><?php echo do_shortcode( wp_kses_post( $general_title ) ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if ( $general_entry ) : ?>
						<div class="col-sm-10 col-md-6 col-md-offset-0 col-sm-offset-1">
							<div class="section-description"><?php echo do_shortcode( wp_kses_post( $general_entry ) ); ?></div>
						</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
</section><!--/#about.front-page-section-->

<?php }// End if().
	?>
