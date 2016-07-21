<?php

# Limit Post

function content_limit($max_char, $stripteaser = 0) {

    $content = get_the_content($stripteaser);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) { echo "";
      echo $content;
      echo "";
   }


   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {

        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo "...";
        echo "";
   }

   else {

      echo "";
      echo $content;
      echo "";
   }
}

?>