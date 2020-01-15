<?php get_header(); ?>

<?php 

$args = array( 
    'post_type' => 'servicios',
    'posts_per_page' => -1
); 

$the_query = new WP_Query( $args ); 
 
?>
    <div class="contenedor_imagen_inicio">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php 
                if ( $the_query->have_posts() ) : 
                while ( $the_query->have_posts() ) : $the_query->the_post(); 
                $posicion = $the_query->current_post +1; 
            ?>
                    <div class="carousel-item <?php if($posicion == 1) { echo 'active'; }else { echo '' ;} ?> ">
                        <div class="cont_imagen">
                            <a href="<?php the_permalink( ) ?>">  
                                <?php the_post_thumbnail('Inicio', ['class' => 'img_inicio d-block w-100', 'alt' => 'Más Fotografía Uruguay' ]); ?>
                            </a>
                        </div>
                        <div class="titulo_inicio">
                            <a href="<?php the_permalink( ) ?>"> <?php the_title(  ) ; ?> </a>
                        </div>                         
                    </div>
                
            <?php  endwhile; ?>
        </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

            <?php
                else: 
                _e( 'No exìste vista de momento.', 'textdomain' ); 
                endif; 
                wp_reset_postdata(); 
            ?>
        </div>
    </div>   
    
    <div id="bottom_mobile" class="text-center py-2">
        Estamos actualizando nuestro sitio ;)
    </div>
    



<div class="contenedor_footer">
    <?php get_footer(); ?>
</div>


