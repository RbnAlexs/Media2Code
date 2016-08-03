<?php

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

	// MIGAJAS DE PAN
	function breadcrumbs() {

		echo '<div class="row">';
			echo '<div class="col-xs-12 breadcrumbs">';
				echo '<a href="'.home_url('/').'">';
					echo '<i class="fa fa-home"></i> ';
					echo 'Inicio';
				echo '</a>';
					echo '<span class="divider"> > </span>';
					if(!is_home()) {
		 				echo '<span class="pagina_actual">';
						if (is_category() || is_single() || is_home() ) {
							echo '<i class="fa fa-bookmark" aria-hidden="true"></i> ';
							the_category(' <span class="divider"> > </span> ');
						} elseif (is_page()) {
						// echo the_title();
						}
		 				echo '</span>';
					}
			echo '</div>';
		echo '</div>'; 
	}
	add_shortcode( 'breadcrumbs', 'breadcrumbs' );

	
	register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'BS3Theme' ),
	) );

	register_nav_menus( array(
    	'secondary' => __( 'Secondary Menu', 'BS3Theme' ),
	) );


	/* MENU WALKER*/
	add_action( 'after_setup_theme', 'wpt_setup' );
	 if ( ! function_exists( 'wpt_setup' ) ):
	 function wpt_setup() { 
	 register_nav_menu( 'primary', __( 'Primary navigation', 'zerif' ) );
	 } endif;

	// REGISTRO MENU WALKER
	 require_once('wp_bootstrap_navwalker.php');



/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    tcx
 * @since      0.2.0
 * @version    1.0.0
 */
function tcx_register_theme_customizer( $wp_customize ) {
	$wp_customize->add_setting(
		'tcx_link_color',
		array(
			'default'     => '#000000',
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => 'Link Color',
			    'section'    => 'colors',
			    'settings'   => 'tcx_link_color'
			)
		)
	);
	/*-----------------------------------------------------------*
	 * Defining our own 'Display Options' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'tcx_display_options',
		array(
			'title'     => 'Display Options',
			'priority'  => 200
		)
	);
	/* Display Header */
	$wp_customize->add_setting(
		'tcx_display_header',
		array(
			'default'    =>  'true',
			'transport'  =>  'postMessage'
		)
	);
	$wp_customize->add_control(
		'tcx_display_header',
		array(
			'section'   => 'tcx_display_options',
			'label'     => 'Display Header?',
			'type'      => 'checkbox'
		)
	);
	/* Change Color Scheme */
	$wp_customize->add_setting(
		'tcx_color_scheme',
		array(
			'default'   => 'normal',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'tcx_color_scheme',
		array(
			'section'  => 'tcx_display_options',
			'label'    => 'Color Scheme',
			'type'     => 'radio',
			'choices'  => array(
				'normal'    => 'Normal',
				'inverse'   => 'Inverse'
			)
		)
	);
	/* Change Font */
	$wp_customize->add_setting(
		'tcx_font',
		array(
			'default'   => 'times',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'tcx_font',
		array(
			'section'  => 'tcx_display_options',
			'label'    => 'Theme Font',
			'type'     => 'select',
			'choices'  => array(
				'times'     => 'Times New Roman',
				'arial'     => 'Arial',
				'courier'   => 'Courier New'
			)
		)
	);
	/* Display Copyright */
	$wp_customize->add_setting(
		'tcx_footer_copyright_text',
		array(
			'default'            => 'All Rights Reserved',
			'sanitize_callback'  => 'tcx_sanitize_copyright',
			'transport'          => 'postMessage'
		)
	);
	$wp_customize->add_control(
		'tcx_footer_copyright_text',
		array(
			'section'  => 'tcx_display_options',
			'label'    => 'Copyright Message',
			'type'     => 'text'
		)
	);
	/*-----------------------------------------------------------*
	 * Defining our own 'Advanced Options' section
	 *-----------------------------------------------------------*/
	$wp_customize->add_section(
		'tcx_advanced_options',
		array(
			'title'     => 'Advanced Options',
			'priority'  => 201
		)
	);
	/* Background Image */
	$wp_customize->add_setting(
		'tcx_background_image',
		array(
		    'default'      => '',
		    'transport'    => 'postMessage'
		)
	);
	
} // end tcx_register_theme_customizer
add_action( 'customize_register', 'tcx_register_theme_customizer' );
/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    tcx
 * @since      0.5.0
 * @version    1.0.0
 */
function tcx_sanitize_copyright( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end tcx_sanitize_copyright
/**
 * Writes styles out the `<head>` element of the page based on the configuration options
 * saved in the Theme Customizer.
 *
 * @since      0.2.0
 * @version    1.0.0
 */
function tcx_customizer_css() {
?>
	 <style type="text/css">
		 body {
		 	font-family: <?php echo get_theme_mod( 'tcx_font' ); ?>
		 	<?php if ( 'normal' === get_theme_mod( 'tcx_color_scheme' ) || '' === get_theme_mod( 'tcx_color_scheme' ) ) { ?>
			 	background: #fff;
			 	color:      #000;
		 	<?php } else { ?>
			 	background: #000;
			 	color:      #fff;
		 	<?php } // end if/else ?>
		 	<?php if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'tcx_background_image' ) ) ) ) ) { ?>
		 		background-image: url( <?php echo $background_image_url; ?> );
		 	<?php } // end if ?>
		 }
	     a { color: <?php echo get_theme_mod( 'tcx_link_color' ); ?>; }
		<?php if( false === get_theme_mod( 'tcx_display_header' ) ) { ?>
			#header { display: none; }
		<?php } // end if ?>
	 </style>
<?php
} // end tcx_customizer_css
add_action( 'wp_head', 'tcx_customizer_css' );
/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package    tcx
 * @since      0.3.0
 * @version    1.0.0
 */
function tcx_customizer_live_preview() {
	wp_enqueue_script(
		'tcx-theme-customizer',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array( 'jquery', 'customize-preview' ),
		'1.0.0',
		true
	);
} // end tcx_customizer_live_preview
add_action( 'customize_preview_init', 'tcx_customizer_live_preview' );


	//custom header
	// Register Theme Features
	function custom_theme_features()  {

		// Add theme support for Custom Header
		$header_args = array(
			'default-image'          => '',
			'width'                  => 1280,
			'height'                 => 400,
			'flex-width'             => true,
			'flex-height'            => true,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => 'FFF',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-header', $header_args );
	}

	// Hook into the 'after_setup_theme' action
	add_action( 'after_setup_theme', 'custom_theme_features' );

	//attach our function to the wp_pagenavi filter
	add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );
	  
	function bootstrap_pagination( $query=null ) {
	  global $wp_query;
	  $query = $query ? $query : $wp_query;
	  $length = 999999999;
	 
	  $paginate = paginate_links(
	        array(
	            'base' => str_replace( $length, '%#%', esc_url( get_pagenum_link( $length ) ) ),
	            'type' => 'array',
	            'total' => $query->max_num_pages,
	            'format' => '?paged=%#%',
	            'current' => max( 1, get_query_var('paged') ),
	            'prev_text' => __('Anterior'),
	            'next_text' => __('Siguiente'),
	        )
	  );
	  if ($query->max_num_pages > 1) :
	  ?>
	        <ul class="pagination pagination-centered">
	          <?php
	          foreach ( $paginate as $page ) {
	              if(!preg_match('/^<span class="page-link dots">/',$page)){
	                 echo '<li class="page-item">' . $page . '</li>';
	              }
	          }
	          ?>
	        </ul>
	<?php
	  endif;
	}

if ( file_exists( STYLESHEETPATH . '/class.my-theme-options.php' ) ) {
	require_once( STYLESHEETPATH . '/class.my-theme-options.php' );
}

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){
            //Defines a default image
            $first_img = "/images/default.jpg";
        }
    return $first_img;
}
	// Registrar barra de widgets en backend

	if (function_exists('register_sidebar')) {  

	include("layouts/header_layout.php");
	include("layouts/home_layout.php");
	include("layouts/single_layout.php");
	include("layouts/page_layout.php");
	include("layouts/404_layout.php");
	include("layouts/footer_layout.php");
	}

	
	// FUNCTIONS
	include("functions/system.php");
	include("functions/frontend.php");
	include("functions/gallery.php");
	include("functions/contact.php");
	include("functions/related_author.php");
	include("functions/content_limit.php");
	include("functions/breadcrumb.php");

	# Single elements
	include("functions/single_bio.php");
	include("functions/single_tags.php");
	include("functions/single_comments.php");
	
?>
