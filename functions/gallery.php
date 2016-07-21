<?php

# Customize Gallery system

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'wpe_gallery_shortcode');

function wpe_gallery_shortcode($attr) {
  $post = get_post();
  static $instance = 0;
  $instance++;
  if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) )
      $attr['orderby'] = 'post__in';
    $attr['include'] = $attr['ids'];
  }

// Allow plugins/themes to override the default gallery template.
$output = apply_filters('post_gallery', '', $attr); if ( $output != '' ) return $output;

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
if ( isset( $attr['orderby'] ) ) { $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
if ( !$attr['orderby'] ) unset( $attr['orderby'] );
}

  extract(shortcode_atts(array(

    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'div',
    'icontag'    => 'dt',
    'captiontag' => 'div',
    'columns'    => 1,
    'size'       => 'full',
    'include'    => '',
    'exclude'    => ''

  ), $attr));

  $id = intval($id);  if ( 'RAND' == $order ) $orderby = 'none';

  if ( !empty($include) ) {

    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }

  } elseif ( !empty($exclude) ) {
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }
  if ( empty($attachments) ) return '';


  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
  }


  $itemtag = tag_escape($itemtag);
  $captiontag = tag_escape($captiontag);
  $icontag = tag_escape($icontag);
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) )
    $itemtag = 'div';
  if ( ! isset( $valid_tags[ $captiontag ] ) )
    $captiontag = 'div';
  if ( ! isset( $valid_tags[ $icontag ] ) )
    $icontag = 'dt';

  $columns = intval($columns);
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery";
  $gallery_style = $gallery_div = '';

  if ( apply_filters( 'use_default_gallery_style', true ) )
    $gallery_style = "
    <style type='text/css'>
    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->";

  $size_class = sanitize_html_class( $size );
  $gallery_div = "<div id='gallery'>";
  $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
  $output .= "<div id='screen'>";
  $output .= "<div id='full-picture'>";

  $i = 0;

  foreach ( $attachments as $id => $attachment ) {

    $link = isset($attr['link']) && 'file' == $attr['link']?: wp_get_attachment_url($id);
    $output .= "<{$itemtag}><a name='pic{$id}'></a><img src='$link' />";  
    $output .= "</{$itemtag}>";

    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "<{$captiontag} id='caption'>".wptexturize($attachment->post_excerpt) ."</{$captiontag}>"; } 
    if ( $columns > 0 && ++$i % $columns == 0 );
  }

  $output .= "</div>";
  $output .= "</div>";
  $output .= "<ul id='navigation'>";

  foreach ( $attachments as $id => $attachment ) {

    $link = isset($attr['link']) && 'file' == $attr['link']?: wp_get_attachment_url($id);
    $output .= "<li><a href='#pic{$id}'><img src='$link'/></a></li>";
  }

  $output .= "</ul>\n";
  $output .= "</div>\n";
  return $output;
}


?>