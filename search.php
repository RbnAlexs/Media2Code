<?php get_header();  ?>
<div class="container-fluid">
	<div class="central"></div>
</div>


<div class="container">
<div class="col-xs-12 col-sm-12 col-md-8">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post_cat">
    <div class="imagen_cat">   
	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail();} else { ?>
    <img src="<?php bloginfo('template_directory'); ?>/css/images/img_default.png" alt="<?php the_title(); ?>" />
		<?php } ?> 
	</a>
	</div>
	<div class="titulo_cat">
	   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
    <div class="nuevo_excerpt">
    <?php echo the_excerpt(); ?>
    </div>
			<!--
			<div class="date">
				<?php echo 'Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
			</div>
			<div class="readmore">
				<a href="<?php the_permalink(); ?>">Ver más</a>
			</div>
			-->
	</div>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php
	if ( function_exists('bootstrap_pagination') ) {
	   bootstrap_pagination();
	}
	?>
	
</div>
 	
<div class="lo_nuevo col-xs-12 col-sm-12 col-md-4">
    <div class="nombre_home col-xs-12 col-sm-12 col-md-12">
        
        <div class="post_nuevo col-xs-12 col-sm-6 col-md-6">    
        <?php $recent = new WP_Query('showposts=2&offset=1'); 
		while($recent->have_posts()) : $recent->the_post();?>
	    
        <div class="inner">
	       	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
	    		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
	    	</a>
	       	<div class="nuevo_title">
	       		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	       	</div>
	       	<!--
	       	<div class="nuevo_excerpt">
	       		<?php echo the_excerpt(); ?>
	       	</div>
	       -->
        </div>  
	   		
	    <?php endwhile;?>
        </div>

            
        <div class="post_nuevo col-xs-12 col-sm-6 col-md-6">    
        <?php $recent = new WP_Query('showposts=2&offset=3, '); 
		while($recent->have_posts()) : $recent->the_post();?>
        <div class="inner">
    	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
 		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
        </a>
	    <div class="nuevo_title">
	       		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	    </div>
	    <!--
	    <div class="nuevo_excerpt">
	       		<?php echo the_excerpt(); ?>
	    </div>
		-->
        </div>  
	   		
	    <?php endwhile;?>
        </div>
		
        <div class="banner_nuevo col-sm-10 col-sm-push-1 col-md-10 col-md-push-1">
			
		</div>
		
        <div class="post_nuevo col-xs-12 col-sm-6 col-md-6">    
        <?php $recent = new WP_Query('showposts=2&offset=5, '); 
		while($recent->have_posts()) : $recent->the_post();?>
        <div class="inner">
    	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
 		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
        </a>
	    <div class="nuevo_title">
	       		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	    </div>
	    <!--
	    <div class="nuevo_excerpt">
	       		<?php echo the_excerpt(); ?>
	    </div>
		-->
        </div>  
	   		
	    <?php endwhile;?>
        </div>
		
        
            
        <div class="post_nuevo col-xs-12 col-sm-6 col-md-6">    
        <?php $recent = new WP_Query('showposts=2&offset=7, '); 
		while($recent->have_posts()) : $recent->the_post();?>
        <div class="inner">
    	<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
 		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
        </a>
	    <div class="nuevo_title">
	       		<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
	    </div>
	    <!--
	    <div class="nuevo_excerpt">
	       		<?php echo the_excerpt(); ?>
	    </div>
		-->
        </div>  
	   		
	    <?php endwhile;?>
        </div>
		
	</div>
</div>
 	
</div>
<?php get_footer(); ?>