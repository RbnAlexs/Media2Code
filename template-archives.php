<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

<div id="content">

	<h1 class="page-title"><?php the_title(); ?></h1>
	
	<div class="entry">
			
		<h3><?php _e('Archives by Month:', 'themejunkie'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h3><?php _e('Archives by Subject:', 'themejunkie'); ?></h2>
		<ul>
			<?php wp_list_categories(); ?>
		</ul>
		
		<h3><?php _e('Archives by Post:', 'themejunkie'); ?></h2>
		<ul>
			<?php wp_get_archives('type=postbypost&limit=50&format=custom&before=<li>&after=</li>'); ?>
		</ul>
		
	</div><!--end .entry-->
	
</div><!--end #content-->

<?php include('page-sidebar.php'); ?>

<?php get_footer(); ?>
