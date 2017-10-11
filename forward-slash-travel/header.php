<?php
/**
 *    The template for displaying the header.
 *
 * @package    WordPress
 * @subpackage illdy
 */
?>
<?php
$logo_id                   = get_theme_mod( 'custom_logo' );
$logo_image                = wp_get_attachment_image_src( $logo_id, 'full' );
$text_logo                 = get_theme_mod( 'illdy_text_logo', __( 'Illdy', 'illdy' ) );
$jumbotron_general_image   = get_theme_mod( 'illdy_jumbotron_general_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.png' ) );
$jumbotron_type            = get_theme_mod( 'illdy_jumbotron_background_type', 'image' );
$jumbotron_single_image    = get_theme_mod( 'illdy_jumbotron_enable_featured_image', false );
$jumbotron_parallax_enable = get_theme_mod( 'illdy_jumbotron_enable_parallax_effect', true );
$preloader_enable          = get_theme_mod( 'illdy_preloader_enable', 1 );
$is_mobile_safari          = preg_match( '/(iPod|iPhone|iPad)/', $_SERVER['HTTP_USER_AGENT'] );

$style = '';

if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
	if ( $jumbotron_general_image && 'image' == $jumbotron_type ) {
		$style = 'background-image: url(' . esc_url( $jumbotron_general_image ) . ');';
	}
} elseif ( ( is_single() || is_page() ) && true == $jumbotron_single_image ) {

	global $post;
	if ( has_post_thumbnail( $post->ID ) ) {
		$style = 'background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ) . ');';
	} else {
		$style = 'background-image: url(' . get_header_image() . ');';
	}
} else {
	$style = 'background-image: url(' . get_header_image() . ');';
}

$url = get_theme_mod( 'header_image', get_theme_support( 'custom-header', 'default-image' ) );

// append the parallax effect
if ( $is_mobile_safari ) {
	$style .= 'background-attachment: scroll;';
} elseif ( $jumbotron_parallax_enable ) {
	$style .= 'background-attachment: fixed;';
}

if ( ( is_single() || is_page() || is_archive() ) && get_theme_mod( 'illdy_archive_page_background_stretch' ) == 2 ) {
	$style .= 'background-size:contain;background-repeat:no-repeat;';
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- for Google -->
	<meta name="description" content="Amy Allen's travel blog detailing how to travel the world using front end development skills." />
	<meta name="keywords" content="Front-End Developer, Travel, Canada, Ottawa, Developer, Wordpress, Wordpress Developer" />    
	<meta name="author" content="Amy Allen" />
	<meta name="copyright" content="Forward Slash Travel" />

	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Forward Slash Travel" />
	<meta name="twitter:site" content="@fwdslashtravel">
	<meta name="twitter:description" content="Amy Allen's travel blog detailing how to travel the world using front end development skills." />
	<meta name="twitter:image" content="" /> <!-- 1,024 x 512 -->

	<!-- Apple Touch Icons PNG Files -->
	<link rel="apple-touch-icon" href="" />
	<link rel="apple-touch-icon" sizes="57x57" href="" />
	<link rel="apple-touch-icon" sizes="60x60" href="" />
	<link rel="apple-touch-icon" sizes="72x72" href="" />
	<link rel="apple-touch-icon" sizes="76x76" href="" />
	<link rel="apple-touch-icon" sizes="114x114" href="" />
	<link rel="apple-touch-icon" sizes="120x120" href="" />
	<link rel="apple-touch-icon" sizes="152x152" href="" />

	<!-- Windows 8 Tile Icons PNG Files -->
	<meta name="msapplication-square70x70logo" content="" />
	<meta name="msapplication-square150x150logo" content="" />
	<meta name="msapplication-wide310x150logo" content="" />
	<meta name="msapplication-square310x310logo" content="" />

	<?php wp_head(); ?>
	
	<title>Forward Slash Travel</title>

	<!-- Global Site Tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107527137-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments)};
	  gtag('js', new Date());

	  gtag('config', 'UA-107527137-1');
	</script>

</head>
<body <?php body_class(); ?>>
<?php if ( 1 == $preloader_enable && ! is_customize_preview() ) : ?>
	<div class="pace-overlay"></div>
<?php endif; ?>
<header id="header" class="<?php if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) : echo 'header-front-page';
else : echo 'header-blog';
endif; ?>" style="<?php echo $style ?>">
	<div class="header__overlay"></div>
	<div class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-8">

					<?php if ( ! empty( $logo_image ) ) { ?>
						<?php echo '<a href="' . esc_url( home_url() ) . '"><img src="' . esc_url( $logo_image[0] ) . '" /></a>'; ?>
					<?php } else { ?>
						<?php if ( get_option( 'show_on_front' ) == 'page' ) { ?>
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( $text_logo ); ?>" class="header-logo"><?php echo esc_html( $text_logo ); ?></a>
						<?php } else { // front-page option ?>
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="header-logo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
						<?php } ?>
					<?php } ?>

				</div><!--/.col-sm-2-->
				<div class="col-sm-8 col-xs-4">
					<nav class="header-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location'  => 'primary-menu',
							'menu'            => '',
							'container'       => false,
							'menu_class'      => 'clearfix',
							'menu_id'         => '',
						) );
					?>
					</nav>
					<button class="open-responsive-menu"><i class="fa fa-bars"></i></button>
				</div><!--/.col-sm-10-->
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.top-header-->
	<nav class="responsive-menu">
		<ul>
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'primary-menu',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'items_wrap'      => '%3$s',
			) );
			?>
		</ul>
	</nav><!--/.responsive-menu-->
	<?php
	if ( get_option( 'show_on_front' ) == 'page' && is_front_page() ) {
		if ( 'video' == $jumbotron_type ) {
			get_template_part( 'sections/front-page', 'header-video' );
		} elseif ( 'slider' == $jumbotron_type ) {
			get_template_part( 'sections/front-page', 'header-slider' );
		}
		get_template_part( 'sections/front-page', 'bottom-header' );
	} else {
		get_template_part( 'sections/blog', 'bottom-header' );
	}
	?>
</header><!--/#header-->
