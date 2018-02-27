<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/manifest.json">
		<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/safari-pinned-tab.svg" color="#B168F0">
		<meta name="theme-color" content="#B168F0"

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<?php include_once( get_stylesheet_directory() . '/assets/sprite/icons.svg' ); ?>

		<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

			<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
				<div class="container">
					<div class="navbar-brand">
						<a class="navbar-item" href="<?php echo home_url(); ?>" rel="nofollow" itemscope itemtype="http://schema.org/Organization">
							<?php show_image( 'site_logo', array( 'alt' => get_bloginfo( 'name' ), 'width' => '112', 'height' => '28' ), true); ?>
							<span class="sr-only"><?php bloginfo('name'); ?></span>
						</a>

						<button class="button navbar-burger" data-target="navMenu">
						  <span></span>
						  <span></span>
						  <span></span>
						</button>
					</div>

					<div class="navbar-menu">
						<?php wp_nav_menu(array(
								'container' => false,
								'menu' => __( 'The Main Menu', 'fsb_theme' ),
								'menu_class' => 'main-nav',
								'theme_location' => 'main-nav',
								'before' => '',
								'after' => '',
								'link_before' => '',
								'link_after' => '',
								'depth' => 0,
								'fallback_cb' => ''
						)); ?>
					</div>
				</div>
			</nav>

		</header>
