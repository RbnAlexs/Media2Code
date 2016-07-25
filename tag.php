<?php get_header();  ?>

<div class="container archive">
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
                <span class="separador"><i class="fa fa-chevron-right" aria-hidden="true" style="color: #000;"></i>  </span>
                <span class="categoria" style="color: #2980b9;">
                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    <?php echo single_tag_title(); ?>
                </span> 
                <?php// echo '<img src="'.z_taxonomy_image_url($id_categoria).'" />'; ?>
            </div>
    </div>          <div class="col-xs-12 card-columns">

        
        <?php if (have_posts()) : while (have_posts()) : the_post();

            //Condicional para asignar la clase 'hidden-xs' a la mitad de los post para ocultarlos
            echo '<div class="card">';
                echo '<div class="imagen_post_home">';   
                    echo '<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">';
                        if ( has_post_thumbnail() ) { the_post_thumbnail(  );
                        } else { 
                            echo '<img src="" alt="'.get_the_title().'" />';
                            }
                    echo '</a>';
                echo '</div>'; 

                echo '<div class="texto_post_home">';
                    echo '<span class="categoria">';
                        echo '<i class="fa fa-bookmark" aria-hidden="true"></i> ';
                        echo the_category(' ,');
                    echo '</span> ';
                    echo '<span class="separador_home">| </span>';
                    echo '<span class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i> '.get_the_time("d.n.y").'</span>';
                    echo '<h5><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></h5>';
                    echo '<p class="extracto hidden-lg-down">'.get_the_excerpt().'</p>';
                echo '</div>';
            echo '</div>';  

        endwhile; endif;
        ?>
    </div>

    <div class="row pagination_row">
    <?php
        if ( function_exists('bootstrap_pagination') ) {
            bootstrap_pagination();
        }
    ?>
    </div>

    <script>
        jQuery('.page-numbers').addClass('page-link').removeClass('.page-numbers');
    </script>
                
</div>

<?php get_footer(); ?>