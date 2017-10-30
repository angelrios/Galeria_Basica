<!DOCTYPE html> <!--Vista del usuario administrador --> <!-- -->

<?php
        include "funcion.php";

        session_start();


        if (isset($_SESSION['usuario'] ))
        {
            //usuario activo

        }
        else
        {
            $msj= "Espacio No Permitido";
            $back="index.php";
            error($msj,$back);
        }

?>

<html>



    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <html lang="es">
        <title>Panel de Usuario</title>
        <link rel="stylesheet" href="css/styles.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    </head>



    <body id="bodi">
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

            <div class="user">
                <?php
                    echo" Usuario: ".$_SESSION['usuario']." <br>";
                    echo '<a href="logout.php">Logout</a> <br> <hr>';

                ?>
            </div>


            <div class="caja-interna">

                <h1>Crear Categoria</h1><br>

                <form action="cargacategoria.php" method="POST">

                    <span>Nombre:</span>
                    <input type="text" name ="nombre"><br><br>

                    <span>Descripcion:</span>
                    <textarea rows="7" cols="40" name="descripcion"></textarea><br>

                    <input type="submit" value="Crea Categoria" /><br>

                </form>
            </div>



            <div class="caja-interna">

                <h1>Crear Album</h1><br>

                <form action="cargaalbum.php" method="POST">

                    <span>Nombre:</span>
                    <input type="text" name ="nombre"><br><br>

                    <span>Descripcion:</span>
                    <textarea rows="7" cols="40" name="descripcion"></textarea><br>

                    <!--Campo de eseleccion multiple para categoria-->
                    Categoria:
                    <?php


                        $tabla=valores("categoria");
                        echo "<select name='categoria'>";
                        while($fila=mysql_fetch_array($tabla))
                        {
                            echo"<option value='".$fila["nombre"]."'>".$fila["nombre"]."</option>";
                        }
                        echo "</select>";
                    ?>


                    <input type="submit" value="Crea Album" /><br>

                </form>
            </div>

            <div class="caja-interna">
                <h1>Subir fotos</h1><br>

                <form method="post" action="cargafoto.php" enctype="multipart/form-data">


                    <span>Imagenes:</span>
                    <input type="file" name="imagen[]" value="" multiple> <br>


                    <!--Campo de seleccion multiple para album-->
                    <span>Album:</span>
                    <?php


                        $tabla=valores("album");
                        echo "<select name='categoria'>";
                        while($fila=mysql_fetch_array($tabla))
                        {

                            $a=valor("categoria","nombre","id_categoria",$fila["id_categoria"]);
                            echo"
                                <option value='".$fila["nombre"]."'>".$fila["nombre"]." - ".$a."</option>
                            ";
                        }
                        echo "</select>";
                    ?>

                    <input type="submit" value="Subir Imagen">


                </form>

            </div>

            <div class="caja-interna">
                <h1>Cargar Logo</h1><br>

                <form method="post" action="logo.php" enctype="multipart/form-data">


                    <span>Seleccionar Logo:</span>
                    <input name="imagen" type="file" /> <br>


                    <input type="submit" value="Cargar Logo">


                </form>

            </div>

            <div class="caja-interna">
                <h1>Red Social</h1><br>

                <form method="post" action="social.php" >


                    <span>Selecciona al sitio:</span>
                    <select name='sitio'>
                        <option value='facebook'>facebook</option>
                        <option value='twitter'>twitter</option>
                        <option value='linkedin'>linkedin</option>
                        <option value='instagrem'>instagram</option>
                        <option value='pinterest'>pinterest</option>
                        <option value='tumblr'>tumblr</option>
                    </select>
                    <br>

                    <span>Pagina Nueva:</span>
                    <input type="text" name ="pagina"><br>

                    <input type="submit" value="Cambiar">


                </form>

            </div>


            <div class="caja-vista">
            <hr>

                <div style="overflow-x:auto;">

                    <br> <h3>Imagenes</h3> <br>
                    <?php
                    imagenes();
                    ?>

                </div>

                <div style="overflow-x:auto;">

                    <br> <h3>Albumes</h3> <br>
                    <?php
                    albunes();
                    ?>

                </div>

                <div style="overflow-x:auto;">

                    <br> <h3>Categorias</h3> <br>
                    <?php
                    categorias();
                    ?>

                </div>
            </div>



        </div>

    </div>
    </body>
</html>
