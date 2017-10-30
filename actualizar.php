<!DOCTYPE html> <!--Vista del usuario administrador --> <!-- -->

<?php
        include "funcion.php";

        session_start();


        if (isset($_SESSION['usuario'] ))
        {
            //echo $_SESSION['usuario'];

        }
        else
        {
            $msj= "Espacio No Permitido";
            $back="index.html";
            error($msj,$back);
        }

?>

<html>

    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Actualizar</title>
        <link rel="stylesheet" href="css/styles.css">
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



        <div class="caja-central">

            <div class="caja-vista">

            <?php

                $ruta=$_GET['ruta'];
                $tabla=$_GET['tabla'];

                if ($tabla=="imagen") {  editar_imagen($ruta, $tabla); }

                if ($tabla=="album") {  editar_album($ruta, $tabla); }

                if ($tabla=="categoria") {  editar_categoria($ruta, $tabla); }

            ?>

            </div>

        </div>

    </div>
    </body>
</html>
