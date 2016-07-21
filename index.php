<?php get_header(); ?>
	<div id="contenedor_articulos" class="container-fluid">
		<section class="container articulos">
			<div class="card-columns">	
				<?php	
					//Variable para ocultar post en mobile (lo usaremos más adelante)
					$hidden_xs = 0;
					function home_posts($id_categoria){ 
							//Query: categoría, número de post y offset
					 		$recent = new WP_Query ('showposts=6&offset=0&cat='.$id_categoria.''); 
					 			//Titulo e imagen por categoría
							 	echo '<div class="card card-block">';
								    echo '<blockquote class="card-blockquote">';
								     	echo '<h3><a href="'.get_category_link($id_categoria).'">'.get_cat_name($id_categoria).'</a></h3>';
										//Plugin Category Images
										echo '<img src="'.z_taxonomy_image_url($id_categoria).'" />';
								    echo '</blockquote>';
								echo '</div>';
						
								while($recent->have_posts()) : $recent->the_post(); 
									++$hidden_xs; $hidden_xs = $hidden_xs % 2;
									//Condicional para asignar la clase 'hidden-xs' a la mitad de los post para ocultarlos
									if ($hidden_xs == 0)
										echo '<div class="card hidden-xs">';
									else
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
													/*foreach((get_the_category()) as $childcat) {
														if (cat_is_ancestor_of($id_categoria, $childcat)) {
															echo '<a href="'.get_category_link($childcat->cat_ID).'">';
															echo '<i class="fa fa-bookmark" aria-hidden="true"></i> ';
															echo $childcat->cat_name . '</a>';
															}

														}*/

												echo '</span> ';
												echo '<span class="separador">| </span>';
												echo '<span class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i> '.get_the_time("F j, Y").'</span>';
												echo '<h5><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></h5>';
												echo '<p class="extracto hidden-lg-down">'.get_the_excerpt().'</p>';
											echo '</div>';

										echo '</div>';	

								endwhile; 
							wp_reset_query();
					} ?>
				<?php home_posts(456); home_posts(699);?>
			</div>
		</section>
		<section class="container proyectos">
			<span class="proyectos_background"></span>
			<div class="row">
				<div class="col-xs-12">
					<h1>Hola</h1>
				</div>
			</div>
		</section>
		<section class="container patrocinadores"></section>
	</div>
<?php get_footer(); ?>