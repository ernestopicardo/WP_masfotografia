<?php 
/* Template Name: Eventos
* Template Post Type: bodas,
*/ 

?>

<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<?php
// OBTIENE LAS FOTOS DE LA GALERIA
    $gallery = get_post_gallery_images( $post );
    $cantimages = count($gallery);
    $fotos = implode(',', $gallery);
?>

<input type="hidden" name="fotos" id="fotos" value="<?php echo $fotos ?>">
<?php if ( $cantimages > 0 ) :  ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="col-12 text-center titulo mt-5">
                <?php the_title(  ); ?>
            </div>
            <div class="col-12 col-md-8 text-center offset-md-2 mt-5">
            <?php the_excerpt(); ?>
            </div>
        </div>
        <div class="col-md-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner mx-auto text-center" id="imagenes">
                </div>
                <!-- CONTROLES DEL SLIDER -->
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </div>

</div>


<script>
    var height = window.innerHeight;
    var fotosArray = document.getElementById('fotos').value;
    var fotos = fotosArray.split(',');

    function cargaImagenes(fotos, i){
        function onProgress(e) {
            var percentComplete = (e.loaded / e.total) * 100;
            console.log('cargado=> ', e.loaded, 'de: ', e.total);
            }
            var req = new XMLHttpRequest();
            req.onprogress = onProgress; // or req.addEventListener("progress", onProgress, false);
            req.open("GET", fotos, true);
            req.onreadystatechange = function (aEvt) {
                if (req.readyState == 4) {
                    if(req.status == 200) {
                        console.log(req);
                        var imagen = document.createElement('img');
                        imagen.src = req.responseURL;
                        imagen.className = 'img-fluid';
                        imagen.style.maxHeight = height + 'px';
                        
                        // divs contenedores
                        contSlider = document.createElement('div');
                        contSlider.className = 'carousel-item';
                        if(i === 0){contSlider.className = 'carousel-item active';}
                        contSlider.append(imagen)
                        document.querySelector('#imagenes').append( contSlider )


                        date = new Date();
                        console.log('Transcurrido => ', date.getMilliseconds());
                    }
                    else {
                        console.log('error');
                    }
                }
            };
            req.send(null);
    }

    for( var i=0;  i < fotos.length ; i++ ){

        cargaImagenes(fotos[i], i);

    }
</script>

<?php endif; ?>

<?php endwhile; else : ?>
        <p><?php esc_html_e( 'Error, no existe evento a mostrar' ); ?></p>
<?php endif; ?>

<?php wp_footer(); ?>

