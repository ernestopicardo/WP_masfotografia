<?php 
// IMAGEN DESTACADA
add_theme_support( 'post-thumbnails' );

// SCRIPTS Y CSS
function masfotografia_scripts() {
    wp_enqueue_style( 'estilos', get_template_directory_uri() . '/css/estilos.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
    wp_enqueue_style( 'BootstrapCss',  'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );
  
    wp_enqueue_script( 'Jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '1.0.0', true  );
    wp_enqueue_script( 'Popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.0.0', true  );
    wp_enqueue_script( 'BootstrapJs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '1.0.0', true  );
    // wp_enqueue_script( 'FontAwsome', 'https://kit.fontawesome.com/61cdc69d36.js', array(), '1.0.0', true  );

    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'masfotografia_scripts' );


// NAV RESPONSIVE
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// REGISTA EL MENU
register_nav_menus( array(
	'primary' => __( 'Menú Principal', 'MÁS FOTOGRAFÍA' ),
) );


// ENTRADA CUSTOM DE INICIO

add_action( 'init', 'Servicios' );
function Servicios() {
     $args = array(
     'public' => true,
     'label' => 'Servicios',
     'supports'  => array( 
         'title',
         'editor',
         'author',
         'thumbnail', 
         'excerpt',
          'comments' ),
     'capability_type' => 'page',
     'show_in_menu' => true,
);
register_post_type( 'Servicios', $args );
}



?>