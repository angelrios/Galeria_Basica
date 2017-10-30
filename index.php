<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Home</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/social.css">
        <!-- Banner -->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <!-- Meta ViewPort -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

        <div class="banner">
        <?php
        include "funcion.php";
        ?>

        <div class="espacio">
            <br>
        </div>

        <div class="product-gallery">

        <?php

            //conexion bd
            $conexion= mysql_connect("localhost","pablo","6545821")
            or die('No se pudo conectar: ' . mysql_error());
            mysql_select_db("liz",$conexion);


            $tabla= mysql_query("SELECT * FROM `album` ORDER BY `id_album` DESC", $conexion);

            $num= mysql_num_rows ( $tabla );

            if ($num==0)
            {

                echo '<img src="img/no-product.png" /><br>';
                echo '<span class="product-name">No hay album</span>';

            }

            while ($fila = mysql_fetch_array($tabla))
            {

                //ruta del album
                $ruta=$fila['ruta'];

                //directorio con todos los archivos del album
                $directorio = opendir ($ruta);

                //lee el primer archivo del album
                while ($archivo = readdir($directorio))
                {
                    if ($archivo != "." && $archivo != ".." )
                    {

                        //imprime
                        echo '<li class="item-product">';
                            echo '<div class="product">';

                                echo '<a href="show.php?id_album='.$fila['id_album'].'"><img src="'.utf8_encode($ruta).'/'.utf8_encode($archivo).'" /></a>';
                                echo '<a href="show.php?id_album='.$fila['id_album'].'"><span class="product-name">'.$fila['nombre'].'</span></a>';
                                echo '<p class="product-description">'.$fila['descripcion'].'</p>';

                            echo '</div>';
                        echo '</li>';

                        break;

                    }
                }

                closedir($directorio);

            }
        ?>


        </div>

        <footer>

                <?php
                    redsocial();
                ?>

        </footer>

    </div>
    </body>
</html>
