<?php

# BREADCRUMB

function the_breadcrumb() {

  if (!is_home()) {

    echo '<a href="';
    echo get_option('home');
    echo '">';
    echo "Home";
    echo "</a> &raquo; ";

    if (is_category() || is_single()) {

      single_cat_title();
      if (is_single()) {
      the_category(', ');
        echo " &raquo; ";
        the_title();
      }

    } elseif (is_page()) {
    echo the_title();
    }

      elseif (is_tag()) {
    echo 'Posts tagged with "'; 
      single_tag_title();
      echo '"';
    }

    elseif (is_day()) {echo "Archive for "; the_time(' F jS, Y');}
    elseif (is_month()) {echo "Archive for "; the_time(' F, Y');}
    elseif (is_year()) {echo "Archive for "; the_time(' Y');}
    elseif (is_author()) {echo "Author Archive";}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "Blog Archives";}
    elseif (is_search()) {echo "Search Results";}
  }
}

?>