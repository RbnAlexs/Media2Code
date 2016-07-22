	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">

		<div class="row info">

			<div class="site-info col-xs-12">

				<div class="row">

					<div class="col-xs-12 col-md-6 col-lg-5">

						<div class="row">
							<div class="col-xs-12 col-sm-5 logo_footer">
								<img src="<?php echo get_bloginfo('template_directory')?>/images/logo_header.png" alt="<?php echo get_bloginfo('title')?>">
							</div>

							<div class="col-xs-12 col-sm-7 quienes_somos">
								<p><span class="site-title">Media2Code == </span> '<?php bloginfo( 'description' ); ?>';</p>
							</div>
						</div>

						<div class="row redes_sociales">

							<div class="col-xs-4 twitter">
								<a href="http://twitter.com/media2code"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
								<small><a href="http://twitter.com/media2code" target="_blank"><strong>Síguenos</strong><br/>en Twitter</a></small>
							</div>

							<div class="col-xs-4  facebook">
								<a href="http://facebook.com/media2code"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<small><a href="http://facebook.com/media2code" target="_blank"><strong>Like Us</strong></br>en Facebook</a></small>
							</div>

							<div class="col-xs-4 instagram">
								<a href="instagram.com/media2code">
									<i class="fa fa-envelope-o" aria-hidden="true"></i> <small><a href="instagram.com/media2code" target="_blank"><strong>Contáctanos</strong></br>por email</a></small>
								</a>
							</div>
						</div>
						
					</div>

					<div class="col-xs-12 col-md-6 col-lg-4 hidden-sm-down">
						<div class="row">
							<div class="col-xs-12">
								<span class="site-title">Este sitio está hecho con { </span>
								<div class="row">
									<div class="col-xs-4 hecho_de">
										<i class="fa fa-coffee" aria-hidden="true"></i></br>
										+<span class="counter">282</span><br/> Tazas de café 
									</div>
									<div class="col-xs-4 hecho_de">
										<i class="fa fa-code" aria-hidden="true"></i></br>
										+<span class="counter">139,329</span><br/>Líneas de código 
									</div>
									<?php $count = wp_count_posts(); 
									$publish_post_count = $count->publish;?>
									<div class="col-xs-4 hecho_de">
										<i class="fa fa-file-text-o" aria-hidden="true"></i><br/>
										<span class="counter"><?php echo $publish_post_count ?></span><br/> Entradas publicadas
									</div>
								</div>
								<span class="site-title">} </span>


							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<span class="site-title">Suscribete, nos gusta dar buenas noticias</span>
								<form action="" class="suscribete_formulario">
									<div class="form-group">
										<input id="Field6" name="Field6" rows="6" class="form-control suscribete" placeholder="Escribe tu email">
	    								<button class="btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
									</div>
								</form>
							</div>

						</div>

					</div>

					<div class="col-xs-3 hidden-md-down">
						<span class="site-title">Ultimas entradas </span>
						<ul class="ultimas_entradas">
						<?php
							$args = array( 'numberposts' => '3' );
							$recent_posts = wp_get_recent_posts( $args );
							foreach( $recent_posts as $recent ){
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
							}
						?>
						</ul>
					</div>


				</div>

				
			</div><!-- .site-info -->

		</div>

		<div class="aviso_privacidad row">
				<div class="col-xs-12 copyright">
					© Media2Code | Todos los derechos reservados | Realizado con: <i class="fa fa-wordpress" aria-hidden="true"></i> + <i class="fa fa-heart" aria-hidden="true"></i> 
					<div class="copyright-links">
						<a href="#">Aviso de Privacidad</a> | <a href="#">Nota Legal</a> | 2016
					</div>

				</div>
		</div>

	</footer>

	<!-- ConterUp -->
	<script src="<?php echo get_bloginfo('template_directory')?>/js/jquery.counterup.min.js"></script> 
	<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script> 
	<script>
	    jQuery(document).ready(function( $ ) {
	        $('.counter').counterUp({
	            delay: 10,
	            time: 3000
	        });
	    });
	</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/bf1878bd0d.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		  // Custom 
		  var stickyToggle = function(sticky, stickyWrapper, scrollElement) {
		    var stickyHeight = sticky.outerHeight();
		    var stickyTop = stickyWrapper.offset().top;
		    if (scrollElement.scrollTop() >= stickyTop){
		      stickyWrapper.height(stickyHeight);
		      sticky.addClass("is-sticky");
		    }
		    else{
		      sticky.removeClass("is-sticky");
		      stickyWrapper.height('auto');
		    }
		  };
		  
		  // Find all data-toggle="sticky-onscroll" elements
		  $('[data-toggle="sticky-onscroll"]').each(function() {
		    var sticky = $(this);
		    var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
		    sticky.before(stickyWrapper);
		    sticky.addClass('sticky');
		    
		    // Scroll & resize events
		    $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
		      stickyToggle(sticky, stickyWrapper, $(this));
		    });
		    
		    // On page load
		    stickyToggle(sticky, stickyWrapper, $(window));
		  });
		});
	</script> 

<?php wp_footer(); ?>
</body>
</html>