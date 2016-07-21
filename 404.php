<?php get_header();  ?>


	<div class="page404" >

	<div class="col-xs-12 col-sm-12 col-md-9">
	<img src="<?php echo get_bloginfo('template_directory');?>/images/404.jpg"> 
		
		<div class="row">		
			<div class="col-xs-12 col-sm-12 col-md-8">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('404 - module 1') ) : ?>
			<?php endif; ?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-8">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('404 - module 2') ) : ?>
			<?php endif; ?>
			</div>
				
			<div class="col-xs-12 col-sm-12 col-md-8">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('404 - module 3') ) : ?>
			<?php endif; ?> 
			</div>
		</div>  
	</div>
	

	<div class="col-xs-12 col-sm-12 col-md-3">
			
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('404 - module 4') ) : ?>
		<?php endif; ?>
	</div>
	
	</div>
	

<?php get_footer(); ?>