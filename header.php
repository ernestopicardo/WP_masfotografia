<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo bloginfo( 'name' ) ;?></title>
    <?php wp_head(); ?>
</head>
<body>

<div class="contenedor_header mx-auto"> 
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <nav class="navbar navbar-expand-lg menu_class "  role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#menu_principal" aria-controls="menu_principal" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-plus-circle"></i> <span>Más Fotografía Uruguay</span> 
                    </button>
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 1,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse ',
                            'container_id'      => 'menu_principal',
                            'menu_class'        => 'nav navbar-nav d-flex justify-content-center mx-auto',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                </nav>
            </div>
        </div>
    </div>
</div>


