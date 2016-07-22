<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="fb:app_id" content="1791072814463207" />
	<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11"> 
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<div id="fb-root"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script>
	  (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1791072814463207";
	  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	</script> 
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >

	<?php if ( is_home() || is_front_page() ) : ?>

		<div id="primary" class="container-fluid video">
			<?php echo do_shortcode('[rev_slider alias="news-background-video3"]'); ?>
		</div>

	<?php endif; ?>

	<header id="home" class="header container" data-toggle="sticky-onscroll">

		<div class="row">

				<div class="col-xs-3 col-lg-1 logo_header ">
					<?php
					echo '<div class="logo_header"><a href="'.esc_url( home_url( '/' ) ).'">';
					echo '<img src="'.get_bloginfo('template_directory').'/images/logo_header.png" alt="'.get_bloginfo('title').'">';
					echo '</a></div>'; 
					?>
				</div>

				<div class="col-xs-6 col-lg-2 titulo_header ">
					<?php 				
						echo '<div class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'<span class="com">.com</span></a></div>';
						echo '<span class="site-description hidden-xs-up"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></span>';
					?>
				</div>     

				<div class="col-xs-9 hidden-lg-down">
				</div>

		</div>

	</header> 








