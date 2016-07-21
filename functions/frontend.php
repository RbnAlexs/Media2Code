<?php

// FUNCTIONS FOR TEMPLATE

load_theme_textdomain( TEMPLATEPATH . '/languages' );
if (function_exists('create_initial_post_types')) create_initial_post_types(); //fix for wp 3.0
if (function_exists('add_custom_background')) add_custom_background();
if (function_exists('add_post_type_support')) add_post_type_support( 'page', 'excerpt' );

# Customize CSSbackend

add_action('login_head', 'my_custom_login_logo');

function my_admin_head() {
echo '<link rel="stylesheet" type="text/css" href="' .content_url('themes/metrics2index/styles/wp-admin.css', __FILE__). '">';
}
add_action('admin_head', 'my_admin_head');

function my_custom_login_logo() {
echo '<link rel="stylesheet" type="text/css" href="';
echo  get_bloginfo ('template_directory');  echo '/styles/wp-admin.css';
echo '" media="screen"/>';
}


# Remove WP-meta

function nowp_head_cleanup() {

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);

    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

    if (!class_exists('WPSEO_Frontend')) {
        remove_action('wp_head', 'rel_canonical');
        add_action('wp_head', 'nowp_rel_canonical');
    }
}

# Remove permalinks titles

if( !is_admin()){
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery');
}

# Force canonical url

function nowp_rel_canonical() {
    global $wp_the_query;
    if (!is_singular()) { return; }
    if (!$id = $wp_the_query->get_queried_object_id()) { return; }

    $link = get_permalink($id);
    echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}

add_action('init', 'nowp_head_cleanup');

function nowp_language_attributes() {
    $attributes = array();
    $output = '';
    if (function_exists('is_rtl')) {
        if (is_rtl() == 'rtl') {
            $attributes[] = 'dir="rtl"';
        }
    }

    $lang = get_bloginfo('language');

    if ($lang && $lang !== 'en-US') {
        $attributes[] = "lang=\"$lang\"";
    } else {
        $attributes[] = 'lang="en"';
    }
    $output = implode(' ', $attributes);
    $output = apply_filters('nowp_language_attributes', $output);
    return $output;
}

?>