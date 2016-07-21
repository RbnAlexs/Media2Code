<?php
class post_title extends WP_Widget {
function __construct() {
parent::__construct(
// IB base del widget
'post_title', 
// Nombre público del widget en UI
__('Título de la entrada', 'post_title_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra el título de la entrada dentro de la página publicada' ), ) 
);
}

function widget( $args, $instance ) {

//This is the variable of the checkbox

    echo $before_widget;

    if('on' == $instance['active'] ) { ?>
    <h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
    <?php }

    else { ?>
    <h2><?php the_title(); ?></h2>
    <?php }

    echo $after_widget;
}

function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['active'] = $new_instance['active'];
    return $instance;
}

function form( $instance ) {

    ?>

    <p>
    <input class="checkbox" type="checkbox" <?php checked($instance['active'], 'on'); ?> id="<?php echo $this->get_field_id('active'); ?>" name="<?php echo $this->get_field_name('active'); ?>" /> 
    <label for="<?php echo $this->get_field_id('active'); ?>">Activar o desactivar permalink</label>
    </p>

<?php
}
}

register_widget('post_title');
?>