<?php  /*  Template Name: contactanos */  ?>
<?php echo mail_send_contact(); ?>
<?php get_header(); ?>

		<div class="slider">

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    	<?php $repeat=3;?>
		    	<?php $numero_post = $repeat; ?>  
				<div class="carousel-inner" role="listbox">
					<?php $recent = new WP_Query('showposts=3'); 
					while($recent->have_posts()) : $recent->the_post();?>
					<div class="<?php if ($repeat==$numero_post){echo ' item active';}else{ echo ' item';} ?>">

						<div class="thumb col-xs-12" style="padding: 0;">
								<div class="flechas">
									<a class="carousel-control left" href="#myCarousel" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
									</a>   
									<a class="carousel-control right" href="#myCarousel" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
									</a>
								</div>

							    <a href="<?php the_permalink(); ?>" rel="bookmark">
								   	<?php set_post_thumbnail_size(); ?>
								   	<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
								</a>
						</div>
						<!--
						<div class="text_slider col-xs-12 col-md-4 text-center">
							<h4>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<i class="fa fa-quote-left"></i> <?php the_title(); ?> <i class="fa fa-quote-right"></i>

								</a>
							</h4>
					    </div>
                        -->
				    </div>     
					<?php $repeat--; endwhile; ?>
				</div>
			</div>

		</div>
<!-- =============================   END SLIDER   ========================================-->

		 <?php 

$host = "mysql51-061.wc1";
$user = "920381_benitez";
$pass = "Nitez456";
$bd = "920381_Registros";
$puerto = 3306;

$nombre = $_POST['txt_nombre'];
$apellidos = $_POST['txt_apellidos'];
$lada = $_POST['txt_lada'];
$tel = $_POST['txt_tel'];
$nacionalidad = $_POST['txt_nacionalidad'];
$correo = $_POST['txt_correo'];
$region = $_POST['txt_region'];
$org = $_POST['txt_org'];
$peticion = $_POST['txt_peticion'];


$mysqli= new mysqli($host,$user,$pass,$bd,$puerto);

//valida el numero de error del estado de la conexion (numero de error)
if($mysqli->connect_errno)
{	
	printf (" ERROR DE CONEXION: " . $mysqli->connect_error . " " . $mysqli->connect_error);	
}



if (isset ($nombre) && !empty ($nombre)) //que exista, y si no esta vacio
	{
	//->=indicador de asignacion 
	$resultado = $mysqli->query("INSERT INTO  contactos (nombre, apellidos, lada, telefono, nacionalidad, correo, region, organizacion, peticion) 
	values ('$nombre', '$apellidos', '$lada', '$tel', '$nacionalidad', '$correo', '$region', '$org', '$peticion')");
	 $enviados = "Datos enviados exitosamente, pronto nos comunicaremos con usted.";;
	if ($nombre == null) {
		 $enviados = "No se han podido enviar los datos, intentelo de nuevo.";;
	}
}

if ($mysqli->error){
	echo ("Fallo consulta: " . $mysqli->error . " " . $mysqli->error);
}
?>

<?php
	if(isset($_POST['submitted'])) :        

			/* name */

			if(trim($_POST['txt_nombre']) === ''):               
				$nameError = __('* Escribe tu Nombre.','zerif');               
				$hasError = true;        
			else:               
				$name = trim($_POST['txt_nombre']);        
			endif; 

			/* last name */

			if(trim($_POST['txt_apellidos']) === ''):               
				$apellidoError = __('* Escribe tus apellidos.','zerif');               
				$hasError = true;        
			else:               
				$apellido = trim($_POST['txt_apellidos']);        
			endif; 

			/* lada */

			if(trim($_POST['txt_lada']) === ''):               
				$ladaError = __('* Escribe tu número de lada.','zerif');               
				$hasError = true;        
			else:               
				$lada = trim($_POST['txt_lada']);        
			endif; 

			/* telephone */

			if(trim($_POST['txt_tel']) === ''):               
				$telError = __('* Escribe tu teléfono.','zerif');               
				$hasError = true;        
			else:               
				$tel = trim($_POST['txt_tel']);        
			endif; 

			/* nacional */

			if(trim($_POST['txt_nacionalidad']) === ''):               
				$nacionalidadError = __('* Escriba su nacionalidad.','zerif');               
				$hasError = true;        
			else:               
				$nacionalidad = trim($_POST['txt_nacionalidad']);        
			endif; 

			/* email */	

			if(trim($_POST['txt_correo']) === ''):               
				$emailError = __('* Escribe tu Email.','zerif');               
				$hasError = true;        
			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['txt_correo']))) :               
				$emailError = __('* Escribe un Email válido.','zerif');               
				$hasError = true;        
			else:               
				$email = trim($_POST['txt_correo']);        
			endif;  


			/* region */


			if(trim($_POST['txt_region']) === ''):               
				$regionError = __('* Escriba su región.','zerif');               
				$hasError = true;        
			else:               
				$region = trim($_POST['txt_region']);       
			endif; 

			/* organizacion */

			if(trim($_POST['txt_org']) === ''):               
				$orgError = __('* Escriba su oraganización.','zerif');               
				$hasError = true;        
			else:               
				$org = trim($_POST['txt_org']);       
			endif;

			/* peticion */

			if(trim($_POST['txt_peticion']) === ''):               
				$peticionError = __('* Escriba su Petición.','zerif');               
				$hasError = true;        
			else:                                     
				$peticion = stripslashes(trim($_POST['txt_peticion']));               
			endif; 		

			/* send the email */
			if(!isset($hasError)):               
				$zerif_contactus_email = get_theme_mod('zerif_contactus_email');
				
				if( empty($zerif_contactus_email) ):
					$emailTo = get_theme_mod('zerif_email');
				else:
					$emailTo = $zerif_contactus_email;
				endif;
				if(isset($emailTo) && $emailTo != ""):
					if( empty($peticion) ):
						$peticion = 'From '.$name;
					endif;
					$body = "Nombre: $name \n\nApellidos: $apellido \n\n Lada:$lada\n\n Telefono:$tel\n\n Nacionalidad:$nacionalidad\n\n Email: $email \n\n Region:$region\n\n Organizacion:$org\n\n Asunto: $subject \n\n Petición: $peticion";              
					$headers = 'De: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Contestar a: ' . $email; 				               
					wp_mail($emailTo, $peticion, $body, $headers);               
					$emailSent = true;        
				else:
					$emailSent = false;
				endif;
			endif;	
		endif;
?>

<?php 
		if(isset($emailSent) && $emailSent == true) :

			echo '<p class="error white-text">'.__('Gracias, tu mensaje se envío exitosamente!','zerif').'</p>';                            

			elseif(isset($_POST['submitted'])):                                    

			echo '<p class="error white-text">'.__('Hubo un problema en el envío de su mensaje.','zerif').'<p>';                            
		endif;
							
		if(isset($nameError) && $nameError != '') :																		 

			echo '<p class="error white-text">'.$nameError.'</p>';																 

				endif;	

		if(isset($emailError) && $emailError != '') :																		 

			echo '<p class="error white-text">'.$emailError.'</p>';																 
		endif;	

		if(isset($telError) && $telError != '') :																		 

			echo '<p class="error white-text">'.$telError.'</p>';																 

		endif;	

		if(isset($peticionError) && $peticionError != '') :																		 

			echo '<p class="error white-text">'.$peticionError.'</p>';																 

		endif;	
?>



<div class="back container-fluid">
<section class="formulario col-md-8 col-md-push-2">
	  	
	    <form method="post" name="formulario">
	    	<h4><?php echo "$enviados"; ?></h4>
	    	<div class="form-group">
	    	<div class="col-md-6">
			<label class= "lbl_contact" for="txt_nombre">Nombre</label>
			<input class="form-control" id="nombre" name="txt_nombre"  placeholder="Nombre" required="" title="No admite números" value="<?php if(isset($_POST['txt_nombre'])) echo $_POST['txt_nombre'];?>"/>
			</div>
			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_apellidos">Apellidos</label>
			<input class="form-control" id="apellidos" name="txt_apellidos" placeholder="Apellidos" required="" title="No admite números" value="<?php if(isset($_POST['txt_apellidos'])) echo $_POST['txt_apellidos'];?>"/>
			</div>

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_lada">Lada</label>
			<input class="form-control" id="lada" name="txt_lada" placeholder="Lada" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if(isset($_POST['txt_lada'])) echo $_POST['txt_lada'];?>"/>
			</div>

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_tel">Teléfono</label>
			<input class="form-control" id="tel" name="txt_tel" required="" placeholder="Teléfono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php if(isset($_POST['txt_tel'])) echo $_POST['txt_tel'];?>"/>
			</div>

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_nacionalidad">Nacionalidad</label>
			<input class="form-control" id="nacionalidad" name="txt_nacionalidad" placeholder="Nacionalidad" value="<?php if(isset($_POST['txt_nacionalidad'])) echo $_POST['txt_nacionalidad'];?>"/>
      		</div>
      		<br>

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_correo">Correo electrónico</label>
			<input class="form-control" id="correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="txt_correo" type= "email" placeholder="mail@marianabenitez.com" required value="<?php if(isset($_POST['txt_correo'])) echo $_POST['txt_correo'];?>"/>
			</div>    

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_region">Región</label>
			<input class="form-control" id="region" name="txt_region" placeholder="Región" value="<?php if(isset($_POST['txt_region'])) echo $_POST['txt_region'];?>"/>
			</div>

			<div class="col-md-6">
			<label class= "lbl_contact" for="txt_org">Intitución u organización</label>
			<input class="form-control" id="org" name="txt_org" placeholder="Intitución u organización" value="<?php if(isset($_POST['txt_org'])) echo $_POST['txt_org'];?>"/>
			</div>

			<div class="col-md-12">
			<label class= "lbl_contact" for="txt_peticion">Petición</label>
			<textarea class="form-control" id="peticion" name="txt_peticion" placeholder="Petición" value="<?php if(isset($_POST['txt_peticion'])) echo $_POST['txt_peticion'];?>"></textarea>
			</div>

			<div class="boton">
				<button type="submit" id="submit" name="submit" class="btn btn-success">Enviar</button>
			</div>
			<br>

		</form>

	  </section>
</div>
	  <!-- //////////////////////////SENCTION MULTIMEDIA ///////////////////////////////-->

	<div class="container">
    <div class="multimedia col-xs-12">
        <div class="video col-xs-12 col-sm-4">
            <div class="nombre">
                <h3 class="text-center">VIDEO</h3>
            </div>
            <div class="contenido_video">
            <?php function youtube(){
                try{
                    $youtube = new SimpleXMLElement('https://www.youtube.com/feeds/videos.xml?channel_id=UC1Z8HvdVpcmNgUHUp3CZQsQ', 0, true);
                    $entry = $youtube->entry[2];
                    $ns = $entry->getNameSpaces(true);
                    $yt = $entry->children($ns['yt']);
                    $v = $yt->videoId;
                    echo
                        '<param name="movie" value="http://www.youtube.com/v/'.$v.'?version=3&amp;autohide=1&amp;showinfo=0"/>
                         <param name="allowScriptAccess" value="always"/>
                         <embed src="http://www.youtube.com/v/'.$v.'?version=3&amp;autohide=1&amp;showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" width="100%" height="250px"/>';
                } catch(Exception $e){}
            }
            ?>
            <?php youtube(); ?>
            </div>
        </div>

        <div class="audio col-xs-12 col-sm-4">
            <div class="nombre">
                <h3 class="text-center">AUDIO</h3>
            </div>
            <div class="contenido_audio">
                <iframe width="100%" height="250" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/148224779&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
            </div>
        </div>    
        <div class="galeria col-xs-12 col-sm-4">
            <div class="nombre">
                <h3 class="text-center">GALERÍA</h3>
            </div>
            <div class="contenido_galeria">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home - module 1') ) : ?>
                <?php endif; ?>                
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>