<!DOCTYPE html> <!--Vista del usuario administrador --> <!-- -->

<html>

    <head>
        <meta charset="utf-8">
        <html lang="es">
        <title>Busqueda</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/social.css">

        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

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


        <div class="show">

        <!-- **************************************************************-->
            <?php //Busqueda de la barra de busqueda (si, es redundante)

            //Conexion con la base de datos:
            //saca las tablas
            //obtiene la palabra a buscar


            $conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
            mysql_select_db("liz",$conexion);


            $tabla  = mysql_query("SELECT * FROM imagen ", $conexion);
            $tabla1  = mysql_query("SELECT * FROM album ", $conexion);
            $tabla2  = mysql_query("SELECT * FROM categoria ", $conexion);

            $num= mysql_num_rows ( $tabla );
            $num1= mysql_num_rows ( $tabla1 );
            $num2= mysql_num_rows ( $tabla2 );


            $palabra= $_POST['palabra'];
            $cont=0;
            $cont2=0;
            $cont3=0;

            //valida si la tabla esta vacia desde el principio
            if ($num <> 0)
            {

                while ($row=mysql_fetch_array($tabla))
                {
                        $coincidencia1 = strripos($row['nombre'], $palabra);

                        $coincidencia2 = strripos($row['descripcion'], $palabra);

                        if ($coincidencia1 === false)
                        {
                            if ($coincidencia2 === false)
                            {
                                //NO
                                $cont2++;

                            }
                            else
                            {
                                //si

                                if ($cont==0)
                                {
                                    $cont++;
                                    echo "<span>Imagenes </span><br>";

                                    echo "<table border = '1' width=100%>";
                                    echo "<tr> ";
                                    echo "<td>Nombre</td> ";
                                    echo "<td>Enlace</td> ";
                                    echo "</tr> ";
                                }
                                echo "<tr> ";
                                echo "<td>".$row["nombre"]."</td> ";
                                echo "<td><a href='show.php?id_album=".$row["id_album"]."'>
                                        Ir al Album</a></td> ";
                                echo "</tr> ";
                            }
                        }
                        else
                        {
                            //si
                            if ($cont==0)
                            {
                                $cont++;
                                echo "<span>Imagenes </span><br>";

                                echo "<table border = '1' width=100%>";
                                echo "<tr> ";
                                echo "<td>Nombre</td> ";
                                echo "<td></td> ";
                                echo "</tr> ";
                            }
                            echo "<tr> ";
                            echo "<td>".$row["nombre"]."</td> ";
                            echo "<td><a href='show.php?id_album=".$row["id_album"]."'>
                                        Ir al Album</a></td> ";
                            echo "</tr> ";

                        }
                }
                echo "</table> \n";
            }
            if ($cont2==$num)
            {
                $cont3++;
            }
            $cont2=0;


            $cont=0;
            if ($num1!=0)
            {
                while ($row1=mysql_fetch_array($tabla1))
                {


                        $coincidencia1 = strripos($row1['nombre'], $palabra);

                        $coincidencia2 = strripos($row1['descripcion'], $palabra);

                        if ($coincidencia1 === false)
                        {
                            if ($coincidencia2 === false)
                            {
                                //NO
                                $cont2++;
                            }
                            else
                            {
                                //si
                                if ($cont==0)
                                {
                                    $cont++;
                                    echo "<span>Album </span><br>";

                                    echo "<table border = '1' width=100%>";
                                    echo "<tr> ";
                                    echo "<td>Nombre</td> ";
                                    echo "<td></td> ";
                                    echo "</tr> ";
                                }

                                echo "<tr> ";
                                echo "<td>".$row1["nombre"]."</td> ";
                                echo "<td><a href='show.php?id_album=".$row1["id_album"]."'>
                                        Ir al Album</a></td> ";
                                echo "</tr> ";
                            }
                        }
                        else
                        {
                            //si
                            if ($cont==0)
                                {
                                    $cont++;
                                    echo "<span>Album </span><br>";

                                    echo "<table border = '1' width=100%>";
                                    echo "<tr> ";
                                    echo "<td>Nombre</td> ";
                                    echo "<td></td> ";
                                    echo "</tr> ";
                                }
                            echo "<tr> ";
                            echo "<td>".$row1["nombre"]."</td> ";
                            echo "<td><a href='show.php?id_album=".$row1["id_album"]."'>
                                        Ir al Album</a></td> ";
                            echo "</tr> ";

                        }
                }
                echo "</table> \n";
            }
            if ($cont2==$num1)
            {
                $cont3++;
            }
            $cont2=0;


            $cont=0;
            if ($num2!=0)
            {


                while ($row1=mysql_fetch_array($tabla2))
                {


                        $coincidencia1 = strripos($row1['nombre'], $palabra);

                        $coincidencia2 = strripos($row1['descripcion'], $palabra);

                        if ($coincidencia1 === false)
                        {
                            if ($coincidencia2 === false)
                            {
                                //NO
                                $cont2++;

                            }
                            else
                            {
                                //si
                                if ($cont==0)
                                {
                                    $cont++;
                                    echo "<span>Categoria </span><br>";

                                    echo "<table border = '1' width=100%>";
                                    echo "<tr> ";
                                    echo "<td>Nombre</td> ";
                                    echo "<td></td> ";
                                    echo "</tr> ";

                                }
                                echo "<tr> ";
                                echo "<td>".$row1["nombre"]."</td> ";
                                echo "<td><a href='show.php?id_album=".$row1["id_album"]."'>
                                        Ir al Album</a></td> ";
                                echo "</tr> ";
                            }
                        }
                        else
                        {
                            //si
                            if ($cont==0)
                            {
                                $cont++;
                                echo "<span>Categoria </span><br>";

                                echo "<table border = '1' width=100%>";
                                echo "<tr> ";
                                echo "<td>Nombre</td> ";
                                echo "<td></td> ";
                                echo "</tr> ";

                            }

                            echo "<tr> ";
                            echo "<td>".$row1["nombre"]."</td> ";
                            echo "<td><a href='album.php?id_categoria=".$row1["id_categoria"]."'>
                                        Ir al Album</a></td> ";
                            echo "</tr> ";

                        }
                }
                echo "</table> \n";
            }
            if ($cont2==$num2)
            {
                $cont3++;
            }
            $cont2=0;

            if ($cont3==3) {
                echo "<span>Su Busqueda No Arrojo Ningun Resultado </span><br>";
            }


            ?>


        </div>

        <footer>

                <?php

                    include "funcion.php";
                    redsocial();
                ?>

        </footer>
    </div>
    </body>
</html>
