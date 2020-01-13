<?php 
/* Template Name: Nostros
* Template Post Type: pages
*/ 
?>

<?php get_header(); ?>
<div class="container">
    <div class="row pt-3">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="img_cabecera col-12 col-md-5 order-md-last" >
            <div class="polaroid">
                <img src=" <?php  the_post_thumbnail_url( )?>" alt="<?php the_title();?>" class="img-fluid">
            </div>
        </div>
        <div class="texto_descripcion col-12 col-md-7 order-md-first">
            <div class="row">
                <div class="titulo col-12">
                    <?php the_title( ) ?>
                </div>
                <div class="descripcion col-12">
                    <?php the_content( ) ?>
                </div>
            </div>
            <div class="separador"></div>
        </div>

        <?php endwhile; else : ?>
	        <p><?php esc_html_e( 'Error, no existe evento a mostrar' ); ?></p>
        <?php endif; ?>
    </div>
</div>


<div> hola desde servicios BODAS</div>