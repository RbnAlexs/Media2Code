<?php
class post_tags extends WP_Widget {
function __construct() {
parent::__construct(
// IB base del widget
'post_tags', 
// Nombre público del widget en UI
__('Etiquetas de la entrada', 'post_tags_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra las etiquetas de la entrada dentro de la página publicada' ), ) 
);
}

// outputs the options form on admin
public function form($instance) {

if ( isset( $instance[ 'style' ] ) ) {
$style = $instance[ 'style' ];
}
else {
}
if ( isset( $instance[ 'style_end' ] ) ) {
$style_end = $instance[ 'style_end' ];
}
else {
}

?>

<p>
<label><?php _e( 'Ingrese HTML tags personalizados:' ); ?></label></br>
<label for="<?php echo $this->get_field_id( 'style' ); ?>"><?php echo ( '< >' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'style' ); ?>" name="<?php echo $this->get_field_name( 'style' ); ?>" type="text" value="<?php echo esc_attr( $style ); ?>" />
<label for="<?php echo $this->get_field_id( 'style_end' ); ?>"><?php echo ( '< / >' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'style_end' ); ?>" name="<?php echo $this->get_field_name( 'style_end' ); ?>" type="text" value="<?php echo esc_attr( $style_end ); ?>" />
</p>

<?php
}

// processes widget options to be saved
public function update($new_instance, $old_instance) {
		
$instance = array();
$instance['style'] = ( ! empty( $new_instance['style'] ) ) ? strip_tags( $new_instance['style'] ) : '';
$instance['style_end'] = ( ! empty( $new_instance['style_end'] ) ) ? strip_tags( $new_instance['style_end'] ) : '';

return $new_instance;
}

// outputs the content of the widget
public function widget($args, $instance) {

	echo $args['before_widget'];?>

	<?php echo $instance["style"] ?>
	<div class="tags"><?php the_tags('Tópicos: ', ', ', ' '); ?>
	<?php edit_post_link('Edit', '[ ', ' ]'); ?>
	</div>
	<?php echo $instance["style_end"] ?>

	<?php echo $args['after_widget'];

	}
}

register_widget( 'post_tags' );

?>