<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>

<div id="content">

	<h1 class="page-title"><?php _e('Links','themejunkie');?></h1>
  
	<div class="entry">
  
		<ul>
		  <?php wp_list_bookmarks('title_li=&category_before=&category_after='); ?>
		</ul>
    
	</div><!--end .entry-->
  
</div><!--end #content-->

<?php include('page-sidebar.php'); ?>

<?php get_footer(); ?>
