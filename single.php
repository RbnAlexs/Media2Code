<?php get_header();  ?>
        <div id="contenedor_articulos" class="container-fluid">

            <div class="container articulos_single">
                    

                <div class="row">

                    <div class="col-xs-12 col-sm-9">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div class="row">
                                <div class="col-xs-12 texto_post_home">
                                        <span class="home">
                                        <?php
                                            echo '<a href="'.home_url('/').'">';
                                                echo '<i class="fa fa-home"></i> ';
                                                echo 'Inicio';
                                            echo '</a>';
                                        ?>
                                        </span>
                                        <span class="separador"><i class="fa fa-chevron-right" aria-hidden="true"></i>  </span>
                                        <span class="categoria">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                            <?php the_category(' ,') ?>
                                        </span> 
                                        <span class="separador">| </span>
                                        <span class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_date('F d, Y'); ?></span>

                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-xs-12 imagen_single">
                                    <div class="texto_post_home texto_single">
                                        <h2 class="titulo_single"><?php the_title(); ?></h2>
                                    </div>
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();} 
                                        else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/images/fallback_image.jpg" alt="<?php the_title(); ?>" />
                                    <?php } ?> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 contenido_single">
                                    <?php the_content(); ?>
                                </div>

                                <div class="col-xs-12 tags">
                                    <?php the_tags('<i class="fa fa-tags" aria-hidden="true"></i> ', ' ', ''); ?>
                                </div>
                            </div>

                        <?php endwhile;?>


                            <div class="row compartir_post">
                                    <div class="col-xs-12">
                                        <h5>Compartelo con tus amigos y corre la voz ;)</h5>
                                    </div>

                                    <div class="col-xs-3 col-md-1  col-md-push-4 share">
                                        <a href="#">
                                            <i class="fa fa-share" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="col-xs-3 col-md-1  col-md-push-4 facebook_share">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="_blank"><i class="fa fa-facebook-official"></a></i>
                                    </div>
                                    <div class="col-xs-3 col-md-1  col-md-push-4 twitter_share">
                                        <a href="http://twitter.com/share/?url=<?php the_permalink() ?>&text='<?php the_title(); ?>'&via=media2code"  onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" target="_blank"><i class="fa fa-twitter"></a></i>
                                    </div>
                                    <div class="col-xs-3 hidden-md-up whats_share"> 
                                        <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"href="whatsapp://send?text=<?php the_permalink();?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp visible-xs"></a></i>
                                    </div>
                            </div>

                            <?php  echo do_shortcode('[starbox] ') ;?>  

                            <div class="row articulos_tags">
                                <div class="col-xs-12">
                                    <h1><i class="fa fa-hand-spock-o" aria-hidden="true"></i> Articulos recomendados</h1>
                                </div>
                            <?php  
                                //Articulos relacionador por etiquetas (tags)
                                 $orig_post = $post;  
                                 global $post;  
                                 $tags = wp_get_post_tags($post->ID);  
                                 if ($tags) {  
                                    $tag_ids = array();  
                                    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                                    $args=array(  
                                        'tag__in' => $tag_ids,  
                                        'post__not_in' => array($post->ID),  
                                        'posts_per_page'=>6,  
                                        'caller_get_posts'=>1  
                                    );  
                                 $my_query = new wp_query( $args );  
                                 while( $my_query->have_posts() ) {  
                                    $my_query->the_post(); ?>                                  
                                            <div class="col-xs-12 col-md-4">
                                                <div class="imagen_tag">
                                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                                                </div>
                                               <div class="titulo_categoria"><a href="<?php the_permalink() ?>"><?php the_title('')?></a></div>  
                                            </div>
                                 <?php }  
                                 }$post = $orig_post;  
                                 wp_reset_query(); 
                            ?>  
                            </div>



                            <div class="fb-comments" data-href="<?php echo the_permalink() ?>" data-colorscheme="light" data-numposts="5"></div> 
                            <style>.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
                            .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
                            </style>     


                    </div> <!-- Fin contenido principal -->

                    <div class="col-xs-12 col-sm-3 sidebar">

                        <div class="row">
                            <div class="col-xs-12 widget">
                                <h4><i class="fa fa-thumb-tack" aria-hidden="true"></i></i> Articulos relacionados</h4>
                        
                                <?php
                                  //Articulos relacionados por categoria
                                  global $post;
                                  $category = get_the_category($post->ID);
                                  $category = $category[0]->cat_ID;
                                  $myposts = get_posts(array('numberposts' =>'3', 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
                                  foreach($myposts as $post) :
                                  setup_postdata($post);
                                  ?>
                                  
                                       <div class="imagen_sidebar"> 
                                           <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                                           <div class="titulo_categoria"><a href="<?php the_permalink() ?>"><?php the_title('')?></a></div>  
                                       </div>

                                <?php wp_reset_postdata();?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <h4><i class="fa fa-star" aria-hidden="true"></i></i> Lo más leído</h4>
                               
                                    <?php
                                        query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=5');
                                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                                               <div class="imagen_sidebar"> 
                                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                                                   <div class="titulo_categoria"><a href="<?php the_permalink() ?>"><?php the_title('')?></a></div>  
                                                </div>
                                        <?php
                                        endwhile; endif;
                                        wp_reset_query();
                                    ?>                                                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 widget">

                                <h4><i class="fa fa-facebook" aria-hidden="true"></i> M2C en Facebook</h4>
                                <div class="fb-page" data-href="https://www.facebook.com/media2code" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/media2code" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/media2code">Media2Code</a></blockquote></div>
                            
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 widget">

                                <h4><i class="fa fa-twitter" aria-hidden="true"></i> M2C en Twitter</h4>
                                <a class="twitter-timeline"  href="https://twitter.com/media2code" data-widget-id="371767581037719552">Tweets por el @media2code.</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
                            </div>
                        </div>

                    </div><!-- Sidebar -->


                </div> <!-- Fila del contenido principal-->
            </div>

        </div>

<?php get_footer(); ?>
