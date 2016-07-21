<?php

// FUNCTIONS FOR SYSTEM

# Activate WP's support

// Register single.php


add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

add_image_size( 'featured', 265, 152, true );
add_image_size( 'featured-big', 800, 370, true );
add_image_size( 'featured-full', 960, 370, true );
add_image_size( 'slides', 960, 440, true );
add_image_size( 'widget', 262, 180, true );
add_image_size( 'related', 195, 110, true );

# Activate WP's support
add_filter('user_contactmethods','add_redessociales_contactmethod',10,1);
function add_redessociales_contactmethod( $contactmethods ) {
  // Add Twitter
  $contactmethods['twitter'] = 'Twitter';
  return $contactmethods;
}

# Cancel html editor, auto-updates, login error, languages, admin bar, generator.

define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_AUTO_UPDATE_CORE', false );
add_filter('login_errors',create_function('$a', "return null;"));
add_filter('language_attributes', 'nowp_language_attributes');
add_filter('the_generator', '__return_false');

if (!current_user_can('edit_users')) {
  add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
  add_filter('pre_option_update_core', create_function('$a', "return null;"));
}

# Unregister base-wordpress widgets
 function unregister_default_widgets() {
     unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     unregister_widget('WP_Widget_Archives');
     unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     unregister_widget('WP_Widget_Categories');
     unregister_widget('WP_Widget_Recent_Posts');
     unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
     unregister_widget('WP_Widget_Tag_Cloud');
     unregister_widget('Twenty_Eleven_Ephemera_Widget');
 }

 add_action('widgets_init', 'unregister_default_widgets', 11);

  function wps_login_error() {
    remove_action('login_head', 'wp_shake_js', 12);
    }
    add_action('login_head', 'wps_login_error');

    function vb_pagination( $query=null ) {
 
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
 
  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    )
  );
 
  if ($query->max_num_pages > 1) :
?>
<ul class="pagination">
  <?php
  foreach ( $paginate as $page ) {
    echo '<li>' . $page . '</li>';
  }
  ?>
</ul>
<?php
  endif;
}

 ?>