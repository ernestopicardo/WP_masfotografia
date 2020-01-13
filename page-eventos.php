<?php 
/* Template Name: Eventos
* Template Post Type: bodas,
*/ 

?>

<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
    
    $args = array(
        'numberposts' => -1, // Using -1 loads all posts
        'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager
        'order'=> 'ASC',
        'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
        'post_parent' => $postID, // Important part - ensures the associated images are loaded
        'post_status' => null,
        'post_type' => 'attachment'
    );
    
    $images = get_children( $args );
    $arry = [];

    foreach($images as $image){
       array_push($arry, $image->guid);
    }

    $fotos = implode(',', $arry);

?>
<input type="hidden" name="fotos" id="fotos" value="<?php echo $fotos ?>">

<div class="container-fluid" id="imagenes"></div>


<script>
    var height = window.innerHeight;
    var fotosArray = document.getElementById('fotos').value;
    var fotos = fotosArray.split(',');

    function cargaImagenes(fotos){
        function onProgress(e) {
            var percentComplete = (e.loaded / e.total) * 100;
            console.log(percentComplete);
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
                        document.querySelector('#imagenes').append( imagen)
                        date = new Date();
                        console.log(date.getMilliseconds());
                    }
                    else {
                        console.log('error');
                    }
                }
            };
            req.send(null);
     }

    for( var i=0;  i < fotos.length ; i++ ){

        cargaImagenes(fotos[i]);

    }
//    console.log( fotos );
</script>


<?php endwhile; else : ?>
        <p><?php esc_html_e( 'Error, no existe evento a mostrar' ); ?></p>
<?php endif; ?>

<?php wp_footer(); ?>

