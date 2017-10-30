<!DOCTYPE html> <!-- Pagina visible de las categorias --> <!-- -->

<html>



    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Categoria</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/social.css">

        <link rel="stylesheet" href="css/sliderwall_verticallist_skin.css">
        <link rel="stylesheet" href="css/slideshow_sample.css">

        <script type="text/javascript" src="javascript/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="javascript/sliderwall-verticalList-1.1.2.js"></script>

<script type="text/javascript">
var mySlider;   // A reference to the SliderWall instance.
var err;
// Initialize the slider.
$(document).ready(function() {
    try {
        // imageSlideshow is the id of the <div> tag that will contain the SliderWall instance.
        $("#imageSlideshow").sliderWallVerticalList({
            // general options
            cssClassSuffix: "",
            domainKeys: "",
            imageAlign: "middleCenter", /* topLeft, topCenter, topRight, middleLeft, middleCenter (default), middleRight, bottomLeft, bottomCenter, bottomRight */
            imageScaleMode: "scaleCrop", /* scale, scaleCrop (default), crop, stretch */
            loopContent: false,
            rssFeed: null,
            selectableContent: true,

            // slideshow options
            autoSlideShow: false,
            slideShowSpeed: 6,

            // timer control options
            showTimer: true,

            // control bar options
            autoHideControlBar: false,
            controlsHideDelay: 5,
            controlsShowHideSpeed: 0.2,
            showControlBar: true,
            playlistPosition: "right", /* left, right (default) */
            thumbnailPaging: "bullets", /* bullets (default), numbering, none */
            slideItemBackground: true,
            showImageThumbnail: true,

            // navigation options
            autoHideNavButtons: true,
            showNavigationButtons: true,

            // text options
            showText: true,
            autoHideText: true,

            // interaction options
            useGestures: true,
            useKeyboard: true,
            useMouseScroll: true,
            pauseOnMouseOver: false,
            disableAutohideOnMouseOver: false,

            // transitions
            transitionType: {
                optimizeForIpad: false,  /* If set to true, it would use only the Alpha and Slide effects. */
                random: false,
                transitions: [
                    /*
                    Possible transitions: Alpha, AlphaBars, BrightSquares, Disc, FlipBars, Iris, LensGlare, None, Slide, SquareFade, SquareLight, Stripes, Waves, WaveScale, Wavy
                    Possible tween types: Back, Bounce, Circ, Cubic, Elastic, Expo (default), Quad, Quart, Quint, Sine
                    Possible easing types: easeIn, easeOut, easeInOut
                    */
                    {
                        name: "Alpha",
                        duration: 0.75,
                        tweenType: "Expo",
                        easing: "easeInOut"
                    },
                    {
                        name: "AlphaBars",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "l2r",
                        random: false,
                        barWidth: 50
                    },
                    {
                        name: "BrightSquares",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "tl2br",
                        random: false,
                        tileWidth: 100,
                        tileHeight: 100
                    },
                    {
                        name: "Disc",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeInOut"
                    },
                    {
                        name: "FlipBars",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "l2r",
                        random: false,
                        barWidth: 80
                    },
                    {
                        name: "Iris",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeInOut"
                    },
                    {
                        name: "LensGlare",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        gradientWidth: 100,
                        margins: 20,
                        lightOffset: 0,
                        lightDirection: false
                    },
                    /*
                    {
                    name: "None" //This is the setting if you don't want to apply any transition effects.
                    },
                    */
                    {
                        name: "Slide",
                        duration: 0.75,
                        tweenType: "Expo",
                        easing: "easeInOut",
                        direction: "horizontal"
                    },
                    {
                        name: "SquareFade",
                        duration: 1.5,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "tl2br",
                        random: false,
                        tileWidth: 100,
                        tileHeight: 100
                    },
                    {
                        name: "SquareLight",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "tl2br",
                        random: false,
                        tileWidth: 100,
                        tileHeight: 100
                    },
                    {
                        name: "Stripes",
                        duration: 1.5,
                        tweenType: "Expo",
                        easing: "easeInOut",
                        direction: "l2r",
                        random: false,
                        barWidth: 50
                    },
                    {
                        name: "Waves",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeIn",
                        direction: "l2r",
                        random: false,
                        barWidth: 60
                    },
                    {
                        name: "WaveScale",
                        duration: 1.5,
                        tweenType: "Expo",
                        easing: "easeOut",
                        maxWidth: 100
                    },
                    {
                        name: "Wavy",
                        duration: 1,
                        tweenType: "Expo",
                        easing: "easeOut",
                        direction: "l2r",
                        random: false,
                        barWidth: 60
                    }
                ]
            },

            // callback functions
            init: null,
            contentLoadStart: null,
            contentLoadComplete: null,
            contentLoadError: null,
            contentShow: null,
            contentHide: null,
            slideClick: null,
            slideshowStart: null,
            slideshowStop: null,
            pageChange: null
        });

        // This is how you get a reference to the SliderWall object to call
        // SliderWall methods (mySlider.next(), mySlider.getSelectedIndex()).
        mySlider = $("#imageSlideshow").data("sliderWall");

    } catch(err) { /* handle any error messages */ }
});
</script>
    </head>



    <body>
    <div class="contenedor">

        <div class="header">

            <div class="logo">
                <img src="img/logo.png" alt="Logo">
            </div>

            <div class="menu-busqueda">
                <div class="search">
                    <form action="busqueda.php" method="POST">
                        <input type="text" name="palabra" placeholder="Buscar..." id="search" class="input-search">
                    </form>
                </div>

                <div class="links">
                    <a href="index.php">Inicio</a>
                    <a href="categorias.php">Categorías</a>
                    <a href="nosotros.php">Quienes Somos</a>
                    <a href="contacto.php">Contacto</a>
                </div>
            </div>
        </div>



        <div id="main">

            <?php
                include "funcion.php";

                $ida=$_GET['id_album'];
                $albumnombre= valor ("album","nombre","id_album",$ida);
                echo'<h1>'.$albumnombre.'</h1> <hr>';

            ?>

            <div id="imageSlideshow">
            <!-- The slider will be placed within this <div> tag. -->

                <div rel="slider_content" style="display: none;">
                <!-- Define the structure and content for the slider. -->

                    <?php
                        slide();
                    ?>

                </div>

            </div> <!-- end SliderWall definition and structure -->

        </div>


        <footer>

                <?php
                    redsocial();
                ?>
        </footer>
    </div>
    </body>
</html>