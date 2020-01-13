<?php 
/* Template Name: Bodas
* Template Post Type: servicios
*/ 

?>
<?php get_header(); ?>

<?php 
    $args = array(
        'post_type' => 'bodas');
    $bodas = new WP_Query( $args );
?>


<div class="container">
    <div class="row pt-3">
    <?php if (  have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="texto_descripcion col-12 col-md-8 offset-md-2">
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

    <!-- SECCION MINITURA DE EVENTOS -->
    <div class="row pt-3">
        <?php if (  $bodas->have_posts() ) : while ( $bodas->have_posts() ) : $bodas->the_post(); ?>
        <div class="texto_descripcion col-12 col-md-4 ">
            <div class="titulo_evento col-12">
                <?php the_title( ) ?>
            </div>
            <div class="imagen_evento col-12">
                <div class="polaroid">
                    <img src=" <?php  the_post_thumbnail_url( )?>" alt="<?php the_title();?>" class="img-fluid">
                </div>
            </div>
        </div>

        <?php endwhile; else : ?>
	        <p><?php esc_html_e( 'No existen '. the_title( ) .' a mostrar' ); ?></p>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>