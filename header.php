<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- Maximum Scale Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta author="media2code team">
    <!-- Facebook Comments -->
	<meta property="fb:app_id" content="1791072814463207" />
	<!-- Google Search Tool -->
	<meta name="google-site-verification" content="ukThubFpPJQt6HaOdAUSScrPms5gzeuxVD7M7JBm7oQ" />
	<link rel="profile" href="http://gmpg.org/xfn/11"> 
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!-- Hoja de estilo -->
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css">
	<!-- Bootstrap 4 alpha -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
	<!-- JQuert 2.2 -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MZ42P4');</script>
	<!-- End Google Tag Manager -->
	<div id="fb-root"></div>
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
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZ42P4"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php if ( is_home() || is_front_page() ) : ?>
		<div id="primary" class="container video">
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








