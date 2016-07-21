<?php
/*
Template Name: Blog
*/
?>
<?php get_header();  ?>
<div class="categoria container">
	<div class="imagen col-xs-12 col-sm-9">
	
        <?php $recent = new WP_Query('showposts=5'); 
        while($recent->have_posts()) : $recent->the_post();?>		<div class="post_cat">
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
			<div class="excerpt_cat">
				<h4><?php the_excerpt(); ?></h4>
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
		<?php
				if ( function_exists('bootstrap_pagination') ) {
		  bootstrap_pagination();
		}
		?>
	</div>

    <div class="sidebar col-xs-12 col-sm-3 text-center">
    
        <div class="row social">
            <div class="social_icons col-xs-12">
                <a href="https://www.facebook.com/MarianaBenitezT" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/css/images/f50.png" style="width:40px;"></a>
                <a href="https://twitter.com/marianabenitezt" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/css/images/t50.png" style="width:40px;"></a>
                <a href="https://www.youtube.com/channel/UC1Z8HvdVpcmNgUHUp3CZQsQ" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/css/images/y50.png" style="width:40px;"></a>
                <a href="https://soundcloud.com/marianabenitezt" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/css/images/s50.png" style="width:40px;"></a>
                <a href="https://instagram.com/marianabenitezt/" target="_blank"><img src="<?php echo get_bloginfo('template_directory');?>/css/images/i50.png" style="width:40px;"></a>
            </div>
        </div>
            
        <div class="row categorias">

            <div class="col-xs-12">
                    <?php query_posts('category_name=orden&showposts=1'); ?>
                        <?php  $category_id = get_cat_ID( 'orden' );    $category_link = get_category_link( $category_id ); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php $post->ID; $thumb_id = get_post_thumbnail_id($post->ID); $thumb_id; ?>
 
                    <div class="orden_home text-center"  style="background: url(
                    <?php echo wp_get_attachment_url($thumb_id);?>) !important;
                    background-repeat: no-repeat !important;
                    background-position: left top !important; ">
                        <div class="categoria">
                            <div class="categoria_home">
                                <a href="<?php echo esc_url( $category_link ); ?>" title="Orden" >Orden</a>
                            </div>
                            <div class="titulo text-center"> 
                               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;  
                    endif; 
                    ?>
            </div>

            <div class="col-xs-12">
                    <?php query_posts('category_name=inclusion&showposts=1'); ?>
                        <?php  $category_id = get_cat_ID( 'inclusion' );    $category_link = get_category_link( $category_id ); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php $post->ID; $thumb_id = get_post_thumbnail_id($post->ID); $thumb_id; ?>
 
                    <div class="orden_home text-center"  style="background: url(
                    <?php echo wp_get_attachment_url($thumb_id);?>) !important;
                    background-repeat: no-repeat !important;
                    background-position: left top !important; ">
                        <div class="categoria">
                            <div class="categoria_home">
                                <a href="<?php echo esc_url( $category_link ); ?>" title="Orden" >Inclusión</a>
                            </div>
                            <div class="titulo text-center"> 
                               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;  
                    endif; 
                    ?>
            </div>

            <div class="col-xs-12">
                    <?php query_posts('category_name=orgullo&showposts=1'); ?>
                        <?php  $category_id = get_cat_ID( 'orgullo' );    $category_link = get_category_link( $category_id ); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php $post->ID; $thumb_id = get_post_thumbnail_id($post->ID); $thumb_id; ?>
 
                    <div class="orden_home text-center"  style="background: url(
                    <?php echo wp_get_attachment_url($thumb_id);?>) !important;
                    background-repeat: no-repeat !important;
                    background-position: left top !important; ">
                        <div class="categoria">
                            <div class="categoria_home">
                                <a href="<?php echo esc_url( $category_link ); ?>" title="Orden" >Orgullo</a>
                            </div>
                            <div class="titulo text-center"> 
                               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;  
                    endif; 
                    ?>
            </div>

            <div class="col-xs-12">
                    <?php query_posts('category_name=igualdad&showposts=1'); ?>
                        <?php  $category_id = get_cat_ID( 'igualdad' );    $category_link = get_category_link( $category_id ); ?>
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php $post->ID; $thumb_id = get_post_thumbnail_id($post->ID); $thumb_id; ?>
 
                    <div class="orden_home text-center"  style="background: url(
                    <?php echo wp_get_attachment_url($thumb_id);?>) !important;
                    background-repeat: no-repeat !important;
                    background-position: left top !important; ">
                        <div class="categoria">
                            <div class="categoria_home">
                                <a href="<?php echo esc_url( $category_link ); ?>" title="Orden" >Igualdad</a>
                            </div>
                            <div class="titulo text-center"> 
                               <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    endwhile;  
                    endif; 
                    ?>
            </div>
    
        </div> 
    </div>
     
</div>
<?php get_footer(); ?>