<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<meta name="author" content="<?php bloginfo( 'name' ); ?>" />
	<link rel="dns-prefetch" href="//google-analytics.com" />
	<link rel="profile" href="//gmpg.org/xfn/11" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>

			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

		<![endif]-->
	<?php wp_head();?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

	<div class="navigation">
		<div class="container">

			<div class="navigation__logo">
					<?php the_custom_logo(); ?>
			</div>
			
			<div class="navigation__menu">

				<span class="navigation__menu--mobile">
					<span></span>
					<span></span>
					<span></span>
				</span>

				<ul class="navigation__menu--links">
					<?php site_menu( 'primary' ); ?>
				</ul>

				<div class="navigation__menu--background"></div>

			</div>

		</div>
	</div>

	<main>