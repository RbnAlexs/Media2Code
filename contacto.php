<?php  /*  Template Name: contacto */  ?>
<?php echo mail_send_contact(); ?>
<?php get_header(); ?>
	<div class="col-xs-12 col-sm-12 col-md-8">
		<div class="contact"><?php if(isset($emailSent) && $emailSent == true) { ?>		
			<div class="thanks">		
				<p>Gracias por tu mensaje, muy pronto te contactaremos.</p>		
			</div>		
		<?php } else { ?>		
			
			<?php if(isset($hasError) || isset($captchaError)) { ?>		
				<p class="error">Lo sentimos, ha ocurrido un error.<p>		
			<?php } ?>
			
			<h3>hola</h3>		
			<form action="<?php the_permalink(); ?>" id="contactForm" method="post">		
				<ul class="contactform">		
					<li><label for="contactName">Escribe tu nombre:</label>			
						<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />			
						<?php if($nameError != '') { ?>			
							<span class="error"><?=$nameError;?></span>			
						<?php } ?>		
					</li>
					<li><label for="email">Escribe tu email:</label>			
						<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />			
						<?php if($emailError != '') { ?>			
							<span class="error"><?=$emailError;?></span>			
						<?php } ?>		
					</li>
					<li><label for="commentsText">Escribe tu mensaje:</label>		
						<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField">
							<?php if(isset($_POST['comments'])) { 
								if(function_exists('stripslashes')) { 
									echo stripslashes($_POST['comments']);
								}else{ 
									echo $_POST['comments'];
								}
							} ?>
						</textarea>		
						<?php if($commentError != '') { 
							?>		
							<span class="error"><?=$commentError;?></span>		
						<?php } ?>		
					</li>
					<li style="padding:10px 0">
						<input type="submit" value="Enviar Mensaje" class="enviar"></input>
					</li>		
				</ul>		
				<input type="hidden" name="submitted" id="submitted" value="true" />					
			</form>				
		<?php } ?>	
		</div><!--end .contact-->
	</div><!--end col-xs-12 col-sm-12 col-md-8-->
	<!--Sidebar -->
	<div class="col-xs-12 col-sm-12 col-md-4">
		<div class="ultimasnoticias">
			<h2>Ultimas Noticias</h2>
				<?php if ( $title ){ echo "<h2>"; echo ($title); echo "</h2>"; } else { }?>
				<?php $recent = new WP_Query('&showposts=6'.'&offset='.'&cat= -13' ); 
				while($recent->have_posts()) : $recent->the_post();?>
				<div class="recent_post">
				    <div class="metadate">
				        <span class="date"><?php echo ''.the_time('g:i a'); ?></span>
				        <div class="titulo"> 
				        	<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>  
				        </div>
					</div>
				</div>
				<?php endwhile; ?>
		</div>

	</div>
<?php get_footer(); ?>