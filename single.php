<?php get_header();  ?>
        <div id="contenedor_articulos" class="container-fluid">




            <div class="container articulos_single">
                    

                <div class="row">

                    <div class="col-xs-12 col-sm-9">
                        <?php //breadcrumbs(); ?>
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

                            <div class="row compartir_post">
                                    <h5>Compartelo con tus amigos y corre la voz ;)</h5>

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



                            <div class="fb-comments" data-href="<?php echo the_permalink() ?>" data-colorscheme="light" data-numposts="5"></div> 
                            <style>.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
                            .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
                            </style>     

                        <?php endwhile;?>

                    </div> <!-- Fin contenido principal -->

                    <div class="col-xs-12 col-sm-3 sidebar">

                        <h4>Articulos relacionados</h4>
                    
                          <?php
                              global $post;
                              $category = get_the_category($post->ID);
                              $category = $category[0]->cat_ID;
                              $myposts = get_posts(array('numberposts' =>'3', 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
                              foreach($myposts as $post) :
                              setup_postdata($post);
                            
                              ?>
                              
                               <div class="col-xs-12"> 
                                    <?php the_post_thumbnail(); ?>

                                   <div class="titulo_categoria"><a href="<?php the_permalink() ?>"><?php the_title('')?></a></div>  
                                  
                                </div>

                            <?php wp_reset_postdata();?>
                            <?php endforeach; ?>

                        <div class="fb-page" data-href="https://www.facebook.com/media2code" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/media2code" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/media2code">Media2Code</a></blockquote></div>


                    </div><!-- Sidebar -->


                </div> <!-- Fila del contenido principal-->
            </div>

        </div>

<?php get_footer(); ?>
