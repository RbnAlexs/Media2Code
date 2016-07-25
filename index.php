<?php get_header(); ?>
	<div id="contenedor_articulos" class="container-fluid">

		<section class="container proyectos">
			<span class="background_proyectos"></span>
			<div class="row">
				<div class="col-xs-12 col-md-7 slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner" role="listbox">
					    <div class="carousel-item active">
					      <h1>Mientras tú dices que es imposible, alguien más lo está programando.</h1>
					    </div>
					    <div class="carousel-item">
					      <h1>Un programador sin Dreamweaver es como un pez sin una bicicleta.</h1>
					    </div>
					    <div class="carousel-item">
					      <h1>No por mucho mega-ram carga Windows más temprano</h1>
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
				<div class="col-xs-12 col-md-3 slider_post">
					<ul  class="list-group">
						<?php
							$args = array( 'numberposts' => '3' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								echo '<li class="list-group-item">';
								echo '<a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"].'</a>';
								echo '</li> ';
							}
						?>
					</ul>
				</div>
			</div>
		</section>

		<section class="container articulos">
			<div class="row">
			
				<div class="col-xs-12 card-columns">	
					<!-- Campo de búsqueda -->
					<form class="navbar-form buscar_content" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control buscar" placeholder="Buscar" type="text" value="" name="s" id="s">
			    				<div class="input-group-btn">
			    					<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    				</div>
							</div>
						</div>
					</form>
					
					<!-- Tabs para la navegación por categoria -->
					<ul class="nav nav-tabs" role="tablist">
						<?php
						$i = 0;
						foreach(get_categories('exclude = 1') as $categorias) {
							//condicional para class 'active'
							if ($i == 0)
								$first_item = 0;
							else
								$first_item = 1;
							//categoria x ID
							$categoria_id = $categorias->cat_ID;
							//categoria x Slug
							$categoria_slug = $categorias->slug;
							home_tabs ($categoria_id, $categoria_slug, $first_item);
							$i++;
						}

						function home_tabs($id_categoria, $slug_categoria, $item_first){
							echo '<li class="nav-item">';
							if ($item_first == 0)
								echo '<a class="nav-link active" data-toggle="tab" href="#'.$slug_categoria.'" role="tab">'.get_cat_name($id_categoria).'</a>';
							else	
								//Manejamos Slug, ya que al existir nombre de ctegorias con un espacio de por medio, no se respeta el #id de las tabs
								echo '<a class="nav-link" data-toggle="tab" href="#'.$slug_categoria.'" role="tab">'.get_cat_name($id_categoria).'</a>';
							echo '</li>';
						}
						?>

					</ul>
					 
				
					<div class="tab-content">

						<?php	
							$i = 0;
	 						//$wp_categorias =  wp_list_categories( array('pad_counts' => 0,'title_li'   => '', 'echo'       => false,'exclude' => 1  ) );
							foreach(get_categories('exclude = 1') as $categorias) {
								if ($i == 0)
									$first_item = 0;
								else
									$first_item = 1;
								$numero_post = rand(4,6);
								$categoria_slug = $categorias->slug;
								$categoria_id = $categorias->cat_ID;
								home_posts($categoria_id, $numero_post, $categoria_slug, $first_item);	
								$i++;
							} 

							//Variable para ocultar post en mobile (lo usaremos más adelante)
							$hidden_xs = 0;
							function home_posts($id_categoria, $post_numero, $slug_categoria, $item_first){ 
								if ($item_first == 0)
									echo '<div class="tab-pane active" id="'.$slug_categoria.'" role="tabpanel">';
								else 
									echo '<div class="tab-pane" id="'.$slug_categoria.'" role="tabpanel">';

										echo '<div class="card card-block">';
											echo '<blockquote class="card-blockquote">';
												echo '<h3><a href="'.get_category_link($id_categoria).'">'.get_cat_name($id_categoria).'</a></h3>';
												//Plugin Category Images
												echo '<a href="'.get_category_link($id_categoria).'"><img src="'.z_taxonomy_image_url($id_categoria).'" /></a>';
												echo category_description($id_categoria);
											echo '</blockquote>';
										echo '</div>';

										//Query: categoría, número de post y offset
								 		$recent = new WP_Query ('showposts='.$post_numero.'&offset=0&cat='.$id_categoria.''); 
									
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

																	}
																*/
																//Mostrar sólo categoría padre de cada entrada mostrada en index.php
																/*foreach((get_the_category()) as $category) {
																if ($category->category_parent == 0) {
																$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
																}
																}
																echo $parentscategory;  */

															echo '</span> ';
															echo '<span class="separador_home">| </span>';
															echo '<span class="fecha"><i class="fa fa-clock-o" aria-hidden="true"></i> '.get_the_time("d.n.y").'</span>';
															echo '<h5><a href="'.get_permalink().'" rel="bookmark">'.get_the_title().'</a></h5>';
															echo '<p class="extracto hidden-lg-down">'.get_the_excerpt().'</p>';
														echo '</div>';

													echo '</div>';	

											endwhile; 
										wp_reset_query();

									echo '</div>';
							} 
								
						?>

					</div>
				

				</div>
				<!--
				<div class="col-lg-2">
					
					<div class="card-bloquote">
						<?php wp_tag_cloud('smallest=10&largest=50&unit=px&number=45&separator=:: &orderby=count&order=RAND');?>
					</div>

				</div>
				-->
 
			</div>
		</section>
		
	</div>
<?php get_footer(); ?>