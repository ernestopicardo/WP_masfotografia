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
        <div class="contenedor_eventos col-12 col-md-4 ">

                <div class="imagen_evento col-12">
                    <div class="polaroid">
                         <a href="<?php the_permalink();?>">
                             <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => 'Más Fotografía Uruguay' ]); ?>
                         </a>
                    </div>
                </div>
                <div class="titulo_evento col-12">
                        <a href="<?php the_permalink();?>">
                            <?php the_title( ) ?>
                        </a>
                </div>
        </div>

        <?php endwhile; else : ?>
	        <p><?php echo ( 'No existen '.  esc_html_e( the_title( ) ) .' a mostrar' ); ?></p>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>