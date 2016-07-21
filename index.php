<?php get_header(); ?>
	<div id="contenedor_articulos" class="container-fluid">
		<section class="container articulos">
			<div class="row">
			
				<div class="col-xs-12 col-lg-9 card-columns">	
					<?php	
						//Variable para ocultar post en mobile (lo usaremos más adelante)
						$hidden_xs = 0;
						function home_posts($id_categoria, $post_numero){ 
								//Query: categoría, número de post y offset
						 		$recent = new WP_Query ('showposts='.$post_numero.'&offset=0&cat='.$id_categoria.''); 
						 			//Titulo e imagen por categoría
								 	echo '<div class="card card-block">';
									    echo '<blockquote class="card-blockquote">';
									     	echo '<h3><a href="'.get_category_link($id_categoria).'">'.get_cat_name($id_categoria).'</a></h3>';
											//Plugin Category Images
											echo '<a href="'.get_category_link($id_categoria).'"><img src="'.z_taxonomy_image_url($id_categoria).'" /></a>';
											echo category_description($id_categoria);
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
													echo '<span class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i> '.get_the_time("d.n.y").'</span>';
													echo '<h5><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></h5>';
													echo '<p class="extracto hidden-lg-down">'.get_the_excerpt().'</p>';
												echo '</div>';

											echo '</div>';	

									endwhile; 
								wp_reset_query();
						} 
					?>
					<?php 				
					    //$wp_categorias =  wp_list_categories( array('pad_counts' => 0,'title_li'   => '', 'echo'       => false,'exclude' => 1  ) );
					    foreach(get_categories('exclude = 1') as $categorias) {
							$categoria_id = $categorias->cat_ID;
							$numero_post = rand(4,6);
							home_posts($categoria_id, $numero_post);	} 
					?>
				</div>

				<div class="col-xs-12 col-lg-3 sidebar_home">
					<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
					    <div><label class="screen-reader-text" for="s">Search for:</label>
					        <input type="text" value="" name="s" id="s" />
					        <input type="submit" id="searchsubmit" value="Search" />
					    </div>
					</form>

					<?php wp_tag_cloud('smallest=10&largest=50&unit=px&number=45&separator=:: &orderby=count&order=RAND');?>
				</div>
 
			</div>

		</section>
		
		<section class="container proyectos">
			<span class="background_proyectos"></span>
			<div class="row">
				<div class="col-xs-12 col-md-7 slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner" role="listbox">
					    <div class="carousel-item active">
					      <h1>Hola 1</h1>
					    </div>
					    <div class="carousel-item">
					      <h1>Hola 2</h1>
					    </div>
					    <div class="carousel-item">
					      <h1>Hola 3</h1>
					    </div>
					  </div>
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="icon-prev" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="icon-next" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		</section>
		
	</div>
<?php get_footer(); ?>