<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brazos_classic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

	<?php
	$template_uri = get_template_directory_uri();
	$upload_url = wp_get_upload_dir()['url'];
	$thumbnail_url = get_the_post_thumbnail_url();
	$home_url = get_home_url();
	?>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tiệm Sách Quốc Dân</title>
	<link rel="icon" href="<?php echo $upload_url ?>/title-icon.png" type="image/x-icon">

	<!--========================== JS import below ==========================-->
	<!-- JQuery & Bootstrap 4 -->
	<script src="<?php bloginfo('stylesheet_directory') ?>/lib/bootstrap-4.2.1-dist/js/jquery-3.3.1.js"></script>
	<script src="<?php bloginfo('stylesheet_directory') ?>/lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
	
	<!-- Slick (for carousel) -->
	<script src="<?php bloginfo('stylesheet_directory') ?>/lib/slick-1.8.1/slick/slick.js"></script>

	<!-- Fancy Box -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/lib/fancybox-2.1/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory') ?>/lib/fancybox-2.1/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Facebook SDK -->
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=463757824153509&autoLogAppEvents=1"></script>
	
	<!-- Customize Js -->
	<script src="<?php bloginfo('stylesheet_directory') ?>/js/script.js"></script>
	<!-- #end JS import -->
	
	
	<!--========================== CSS import below ==========================-->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory') ?>/custom.css">
	<!-- #end CSS import -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="150">

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'brazos-classic'); ?></a>

		<div class="d-block">
			<!-- NAVBAR fixed-top when scrolled -->
			<?php
			$logo = get_field('nav_brand');
			?>
			<nav class="navbar navbar-expand-lg navbar-light bg-none fixed-top pt-5 pb-3">
				<a class="navbar-brand" href="<?php echo $home_url ?>"><img class="w-100 h-100" src="<?php echo $logo ?>" alt="" srcset=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php wp_nav_menu(array(
					'container' => 'div',
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'navbarSupportedContent',
					'menu_class' => 'navbar-nav mr-auto',
					'menu_id' => FALSE,
				)) ?>
			</nav>
			<!-- end-nav -->

			<!-- TRENDING block - slider to display best seller or trending -->
			<?php
			$tag = get_field('ten_chuyen_muc');
			$title = get_field('tieu_de');
			$content = get_field('noi_dung');
			$hero_bg = get_field('hero_background');
			$btn_content = get_field('noi_dung_nut');
			$link_best_seller = get_field('link_nut');
			$img = get_field('bia_sach_best_seller');
			?>
			<section id="trending" style="background-image: url(<?php echo $hero_bg ?>)" class="align-items-center justify-content-center d-flex">
				<div class="row align-items-center">
					<div class="col-md-6 d-none d-md-block">
						<a href="<?php echo $link_best_seller ?>" target="_blank">
							<img id="trendingBookImg" class="left-hidden" src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
						</a>
					</div>
					<div class="col-md-6 hidden pl-5 pr-5" id="trendingBookContent">
						<h6 class="text-uppercase text-white-50 mb-5">
							<?php echo $tag; ?>
						</h6>
						<h1 class="text-white text-capitalize">
							<?php echo $title; ?>
						</h1>
						<h4 class="font-italic text-white mt-5 mb-5 blockquote">
							<?php echo $content; ?>
						</h4>
						<?php if ($btn_content) { ?>
							<a name="" target="_blank" class="pt-3 pb-3 pl-5 pr-5 btn-rounded btn my-btn shadow-sm text-uppercase" href="<?php echo $link_best_seller ?>" role="button">
								<?php echo $btn_content ?>
							</a>
						<?php } ?>
					</div>
				</div>
			</section>
			<!-- end trending -->
		</div>
		<!-- <div id="content" class="site-content"> -->