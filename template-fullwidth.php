<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>

<div id="fullcontent">

	<?php if (have_posts()) : ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div class="entry">
			<?php the_content(''); ?>
		</div><!--end .entry-->
		
		<div class="clear"></div>
		
		<?php edit_post_link('[ '.__('Edit', 'themejunkie').' ]', '', ''); ?>
	
	<?php endwhile; ?>

	<?php else : ?>
	
	<?php endif; ?>

</div><!--end #fullcontent-->

<?php get_footer(); ?>
