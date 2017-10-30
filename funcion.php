<?php

//Retorna true o false dependiendo si existe el registro en el campo de la tabla dada por parametros
function validar($tabla,$campo,$valor)
{

	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//contador para las coincidencias
	$cont=0;

	//todos los datos de la tabla
	$sql="SELECT * FROM ".$tabla;

	//ejecuta la query
	$res = mysql_query($sql,$conexion);

	//ciclo de la busqueda
	while($fila=mysql_fetch_array($res))
	{
		if ($fila[$campo]==$valor)
		{
			$cont++;
		}
	}


	if ($cont==0)
	{
		//retorna true si no existe el valor en la tabla
		return true;
	}
	else
		//retorna false si ya existe el valor en la tabla
		return false;

	mysql_close($conexion);
}


//Retorna un valor exacto del campo de la tabla que se le pasa por parametro, siempre que coincidan
//el comparador con el identificador
function valor($tabla,$campo,$comparador,$identificador)
{

	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//contador para las coincidencias
	$cont=0;

	//todos los datos de la tabla
	$sql="SELECT ".$campo." FROM `".$tabla."` WHERE ".$comparador."= '".$identificador."'";


	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	//fila de resultados
	$fila=mysql_fetch_array($res);

	//campo especifico
	$fila[$campo];


	if ($fila[$campo])
	{
		//retorna el valor si existe  en la tabla
		return $fila[$campo];
	}
	else
		//retorna false si no existe el valor en la tabla
		return false;

	mysql_close($conexion);
}

//retorna una tabla de valores
function valores($tabla)
{

	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);


	//todos los datos de la tabla
	$sql="SELECT * FROM ".$tabla;


	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	return $res;


	mysql_close($conexion);
}


function nombre($id,$tabla,$identificador,$campo)
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	$sql="SELECT ".$campo." FROM ".$tabla." WHERE ".$identificador."='".$id."'";

	$res = mysql_query($sql,$conexion);

	$fila = mysql_fetch_array($res);

	echo $fila[$campo];
}

//muestra todos los valores de la tabla de imagenes
function imagenes()
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//todos los datos de la tabla
	$sql="SELECT * FROM imagen";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	//Mostrar imagenes
	echo"
	<table>
		<tr>
			<th style='width:35%' >Vista Previa</th>
			<th style='width:20%' >Categoria</th>
			<th style='width:20%' >Album</th>
			<th style='width:7%'  >Eliminar</th>
			<th style='width:7%'  >Editar</th>
		</tr>
	";

	while ($fila = mysql_fetch_array($res))
	{
		echo
		"<tr>

			<td><img src=".utf8_encode($fila['ruta'])." /></td>
			<td>".valor("categoria","nombre","id_categoria",$fila['id_categoria'])."</td>
			<td>".valor("album","nombre","id_album",$fila['id_album'])."</td>
			<td>
				<a href=
					'
					eliminar.php?
					ruta=".utf8_encode($fila['ruta'])."
					&tabla=imagen
					'
				><i class='fa fa-trash fa-3x' aria-hidden='true'></i></a>
			</td>
			<td>
				<a href=
					'
					actualizar.php?
					ruta=".utf8_encode($fila['ruta'])."
					&tabla=imagen
					'
				><i class='fa fa-pencil fa-3x' aria-hidden='true'></i></a>
			</td>
		</tr>";
	}
	echo "</table>";

	mysql_close($conexion);
}

//muestra todos los valores de la tabla album
function albunes()
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//todos los datos de la tabla
	$sql="SELECT * FROM album";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	//Mostrar imagenes
	echo"
	<table border=1 width=100%>
		<tr>
			<th>Categoria</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Eliminar</th>
			<th>Editar</th>
		</tr>
	";



	while ($fila = mysql_fetch_array($res))
	{
		echo
		"<tr>
			<td>".valor("categoria","nombre","id_categoria",$fila['id_categoria'])."</td>
			<td>".$fila['nombre']."</td>
			<td>".$fila['descripcion']."</td>
			<td>
				<a href=
					'
					eliminar.php?
					ruta=".$fila['ruta']."
					&tabla=album
					'
				><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a>
			</td>
			<td>
				<a href=
					'
					actualizar.php?
					ruta=".$fila['ruta']."
					&tabla=album
					'
				><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a>
			</td>

		</tr>";
	}
	echo "</table>";

	mysql_close($conexion);
}

//muestra todos los valores de la tabla de categorias
function categorias()
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//todos los datos de la tabla
	$sql="SELECT * FROM categoria";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	//Mostrar imagenes
	echo"
	<table border=1 width=100%>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Eliminar</th>
			<th>Actualizar</th>
		</tr>
	";

	while ($fila = mysql_fetch_array($res))
	{
		echo
		"<tr>

			<td>".$fila['nombre']."</td>
			<td>".$fila['descripcion']."</td>
			<td>
				<a href=
					'
					eliminar.php?
					ruta=".$fila['ruta']."
					&tabla=categoria
					'
				><i class='fa fa-trash fa-2x' aria-hidden='true'></i></a>
			</td>
			<td>
				<a href=
					'
					actualizar.php?
					ruta=".$fila['ruta']."
					&tabla=categoria
					'
				><i class='fa fa-pencil fa-2x' aria-hidden='true'></i></a>
			</td>
		</tr>";
	}
	echo "</table>";

	mysql_close($conexion);
}

//envia el mensaje de error a la pagina correspondiente
function error($msj, $back)
{

	echo'
	<form name="envia" action="error.php" method="POST">

        <input type="hidden" name="error" value="'.$msj.'">
		<input type="hidden" name="pagina" value="'.$back.'">

    </form>

	<script language="JavaScript">

		document.envia.submit()

	</script>
    ';

}

//elimina una carpeta aunque contenga archivos
function eliminarDir($carpeta)
{
	//glob devuelve una matriz con las coincidencias de la ruta pasada por marametro
	//el foreach las recorre una por una
	// el /* es parae specificar todas las carpetas dentro de la ruta dada
    foreach(glob($carpeta . "/*") as $archivos_carpeta)
    {
        //echo $archivos_carpeta."<br>";

 		//evalua si es una carpeta o un archivo
        if (is_dir($archivos_carpeta))
        {
        	//si es una careta la funcion se llama a si misma con la direccion de la carpeta
            eliminarDir($archivos_carpeta);
        }
        else
        {	//si es un archivo, lo borra
            unlink($archivos_carpeta);
        }
    }

 	// despues de haber borrado el contenido, borra la carpeta
    rmdir($carpeta);

    echo'
			<html>
				<head>
					<meta http-equiv="REFRESH"
					content="0;url=carga_archivos.php">
				</head>
			</html>
			';
}

//inicio
function mostrar_album()
{
	//conexion bd
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db("liz",$conexion);


	$tabla= mysql_query("SELECT * FROM album ", $conexion);

	$num= mysql_num_rows ( $tabla );

	if ($num==0)
	{

		echo '<img src="img/no-product.png" />';
		echo '<span class="product-name">No hay album</span>';

	}

	$random= rand(1,$num);

	$cont=0;

	while ($fila = mysql_fetch_array($tabla))
	{
		$cont++;
		if ($cont==$random)
		{
			//ruta del album
			$ruta=$fila['ruta'];

			//directorio con todos los archivos del album
			$directorio = opendir ($ruta);

			//lee el primer eschivo del album
			while ($archivo = readdir($directorio))
			{
			    if ($archivo != "." && $archivo != ".." )
			    {

			    //imprime
echo '<a href="show.php?id_album='.$fila['id_album'].'"><img src="'.$ruta.'/'.utf8_encode($archivo).'" /></a>';
echo '<a href="show.php?id_album='.$fila['id_album'].'"><span class="product-name">'.$fila['nombre'].'</span></a>';
				break;

			    }
			}



			break;
			closedir($directorio);
		}
	}
}

//categorias
function mostrar_album1()
{
	//conexion bd
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db("liz",$conexion);

	//obtiene la categoria
	$idc=$_GET['id_categoria'];


	$tabla= mysql_query("SELECT * FROM `album` WHERE `id_categoria`=".$idc, $conexion);

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
}


function mostrar_album2()
{

	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());

	mysql_select_db("liz",$conexion);

	//id del album
	$ida=$_GET['id_album'];

	$tabla= mysql_query("SELECT * FROM album WHERE id_album='".$ida."' ", $conexion);


	while ($fila = mysql_fetch_array($tabla))
	{
		echo '<h1 class="titulo">'.$fila["nombre"].'</h1> <hr>';

		//ruta del album
		$ruta=$fila['ruta'];

		//directorio con todos los archivos del album
		$directorio = opendir ($ruta);

		//lee los archivos del album
		while ($archivo = readdir($directorio))
		{



		    if ($archivo != "." && $archivo != ".." )
		    {
		        //imprime


				$descripcion= valor ("imagen","descripcion","ruta",$ruta.'/'.$archivo);

				echo '<div class="item-product">';
					    echo '<div class="product">';

							echo '<img src="'.$ruta.'/'.utf8_encode($archivo).'" >';
							echo '<span style="word-wrap: break-word;"
							class="product-name">'.utf8_encode($archivo).'</span>';
							echo '<span style="word-wrap: break-word;"
							class="product-name">'.utf8_encode($descripcion).'</span>';

						echo '</div>';
					echo '</div>';
		    }
		}
		closedir($directorio);
	}
}

//slider
function mostrar_album3()
{
	//conexion bd
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db("liz",$conexion);


	$tabla= mysql_query("SELECT * FROM `album` ORDER BY `id_album` DESC", $conexion);

	if (mysql_num_rows($tabla)==0) {
		echo'<div class="slider-element">';
		echo'<img src="img/not-found.png" />';
		echo'</div>';

		echo'<div class="slider-element">';
		echo'<img src="img/not-found.png" />';
		echo'</div>';

		echo'<div class="slider-element">';
		echo'<img src="img/not-found.png" />';
		echo'</div>';
	}

	$cont=0;
	while ($fila = mysql_fetch_array($tabla))
	{
		if ($cont==3) {break;}

		//ruta del album
		$ruta=$fila['ruta'];

		//directorio con todos los archivos del album
		$directorio = opendir ($ruta);

		//lee el primer archivo del album
		while ($archivo = readdir($directorio))
		{
		    if ($archivo != "." && $archivo != ".." )
		    {
		    	$cont++;

		    	//imprime
		    	echo'<div class="slider-element">';
				echo '<a href="show.php?id_album='.$fila['id_album'].'">
				<img src="'.$ruta.'/'.utf8_encode($archivo).'" /></a>';
				echo'</div>';


			//se sale de este ciclo
			break;

		    }
		}

		closedir($directorio);

	}




}

function editar_imagen($ruta, $tabla)
{

	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//registro especifico de la tabla
	//convierte la ruta a ISO para que la base de datos la lea sin problemas
	$sql="SELECT * FROM ".$tabla." WHERE ruta='".utf8_decode($ruta)."'";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	$fila = mysql_fetch_array($res);

	echo"
	<form action=\"actualizar-s.php\" method=\"POST\">
	<table border=1 width=100%>
		<tr>

			<th style='width:15%' >Cambiar Album</th>
			<th style='width:15%' >Cambiar Nombre</th>
			<th style='width:20%' >Vista Previa</th>
			<th style='width:20%' >Descripcion</th>
			<th style='width:10%'  >Estado</th>
			<th style='width:10%'  ></th>

		</tr>
		<tr>
			<td>";

			$tabla1=valores("album");
		    echo "<select name='album'>";
		    while($fila1=mysql_fetch_array($tabla1))
		    {
		        echo"<option value='".$fila1["nombre"]."'>".$fila1["nombre"]."</option>";
		    }
		    echo "</select>";

	//en la linea 635 y 636 se codifica la ruta a utf-8 para que el html pueda procesar la ñ y los acentos
	echo"	</td>

			<td><input type=\"text\" name=\"nombre\" value= '".utf8_encode($fila['nombre'])."' ></td>
			<td><img src=".utf8_encode($fila['ruta'])." /></td>

			<td><input type=\"text\" name=\"descripcion\" value= '".utf8_encode($fila['descripcion'])."' >
			</td>

			<td><select name='estado'>
				<option value='A'>Activo</option>
				<option value='I'>Inactivo</option>
			</select></td>

			<td><input type='submit' value='Modificar'></td>

		</tr>

		<input type=\"hidden\" name=\"ruta\" value=".$ruta.">
		<input type=\"hidden\" name=\"tabla\" value=".$tabla.">

	</table>
	</form>";

}

function editar_album($ruta, $tabla)
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//registro especifico de la tabla
	$sql="SELECT * FROM ".$tabla." WHERE ruta='".$ruta."'";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	$fila = mysql_fetch_array($res);

	echo"
	<form action=\"actualizar-s.php\" method=\"POST\">
	<table border=1 width=100%>
		<tr>

			<td>Cambiar Categoria</td>
			<td>Cambiar Nombre</td>
			<td>Cambiar Descripcion</td>
			<td></td>

		</tr>
		<tr>
			<td>";

			$tabla1=valores("categoria");
		    echo "<select name='categoria'>";
		    while($fila1=mysql_fetch_array($tabla1))
		    {
		        echo"<option value='".$fila1["nombre"]."'>".$fila1["nombre"]."</option>";
		    }
		    echo "</select>";

	echo"	</td>
			<td><input type=\"text\" name=\"nombre\" value= '".$fila['nombre']."' ></td>
			<td>
				<textarea rows=\"7\" cols=\"40\" name=\"descripcion\">".$fila['descripcion']."
				</textarea>
			</td>

			<td><input type=\"submit\" value=\"Modificar\"></td>
		</tr>

		<input type=\"hidden\" name=\"ruta\" value=".$ruta.">
		<input type=\"hidden\" name=\"tabla\" value=".$tabla.">

	</table>
	</form>";

}


function editar_categoria($ruta, $tabla)
{
	//Conexion con el servidor a travez del usuario
	$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

	//conexion con la base de datos
	mysql_select_db("liz",$conexion);

	//registro especifico de la tabla
	$sql="SELECT * FROM ".$tabla." WHERE ruta='".$ruta."'";

	//matriz de resultados
	$res = mysql_query($sql,$conexion);

	$fila = mysql_fetch_array($res);

	echo"
	<form action=\"actualizar-s.php\" method=\"POST\">
	<table border=1 width=100%>
		<tr>
			<td>Cambiar Nombre</td>
			<td>Cambiar Descripcion</td>
			<td></td>

		</tr>
		<tr>
			<td><input type=\"text\" name=\"nombre\" value= '".$fila['nombre']."' ></td>
			<td>
				<textarea rows=\"7\" cols=\"40\" name=\"descripcion\">".$fila['descripcion']."
				</textarea>
			</td>

			<td><input type=\"submit\" value=\"Modificar\"></td>
		</tr>

		<input type=\"hidden\" name=\"ruta\" value=".$ruta.">
		<input type=\"hidden\" name=\"tabla\" value=".$tabla.">

	</table>
	</form>";

}

function mostrar_album4()
{
	//conexion bd
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db("liz",$conexion);



	$tabla_categoria= mysql_query("SELECT * FROM `categoria`", $conexion);

	// $registro es igual una categoria en especifico
	while ($registro = mysql_fetch_array($tabla_categoria))
	{
		//tabla de album donde la categoria es la misma que registro
		$tabla= mysql_query("SELECT * FROM `album` WHERE `id_categoria`=".$registro['id_categoria'], $conexion);

		$num= mysql_num_rows ( $tabla );

		if ($num==0)
		{

			echo '<div class="item-product">';
				echo '<div class="product">';

					echo '<img src="img/no-product.png" /><br>';
					echo '<span class="product-name">'.$registro['nombre'].'(No hay album)</span>';

				echo '</div>';
			echo '</div>';
		}

		while ($fila = mysql_fetch_array($tabla))
		{

			$cont=0;

			//ruta del album
			$ruta=$fila['ruta'];

			//directorio con todos los archivos del album
			$directorio = opendir ($ruta);

			//lee el primer archivo del album
			while ($archivo = readdir($directorio))
			{
			    if ($archivo != "." && $archivo != ".." )
			    {
			    	$cont++;
				    //imprime
				    echo '<div class="item-product">';
					    echo '<div class="product">';

							echo '<a href="album.php?id_categoria='.$registro['id_categoria'].'"><img src="'.$ruta.'/'.utf8_encode($archivo).'" /></a>';
							echo '<a href="album.php?id_categoria='.$registro['id_categoria'].'"><span class="product-name">'.$registro['nombre'].'</span></a>';
							echo '<p class="product-description">'.$registro['descripcion'].'</p>';

						echo '</div>';
					echo '</div>';

					break;

			    }
			}

			//si al menos uno de los albumes de esa categoria tiene imagenes
			//si ningun album de la categoria tiene imagenes, entonces no se muestra la categoria
			if ($cont!==0)
			{

				break;
				closedir($directorio);
			}



		}

	}
}



function redsocial()
{
	//conexion bd
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db("liz",$conexion);

	$paginas= mysql_query("SELECT * FROM `redsocial`", $conexion);



	echo '<aside id="sticky-social">
                  <ul>
	';

	while ($registro = mysql_fetch_array($paginas))
	{
		$nombre= $registro['nombre'];
		$pagina= $registro['pagina'];

		echo'

			<li><a href="'.$pagina.'" class="entypo-'.$nombre.'" target="_blank"></a></li>

		';


	}

	echo '		</ul>
          </aside>
	';


}


function slide()
{
	$conexion= mysql_connect("localhost","pablo","6545821")
	or die('No se pudo conectar: ' . mysql_error());

	mysql_select_db("liz",$conexion);

	//id del album
	$ida=$_GET['id_album'];

	$tabla= mysql_query("SELECT * FROM album WHERE id_album='".$ida."' ", $conexion);



	while ($fila = mysql_fetch_array($tabla))
	{

		//ruta del album
		$ruta=$fila['ruta'];

		//directorio con todos los archivos del album
		$directorio = opendir ($ruta);

		//lee los archivos del album
		while ($archivo = readdir($directorio))
		{

		    if ($archivo != "." && $archivo != ".." )
		    {
		        //imprime

				$descripcion= valor ("imagen","descripcion","ruta",$ruta.'/'.$archivo);

			echo'<div rel="slide">
					<div rel="type">image</div>
					<div rel="title">'.utf8_encode($archivo).'</div>
					<div rel="description">'.utf8_encode($descripcion).'</div>
					<div rel="content">'.$ruta.'/'.utf8_encode($archivo).'</div>
					<div rel="thumbnail">../thumbnails/02.jpg</div>
					<div rel="thumbnail_title">'.utf8_encode($archivo).'</div>
					<div rel="thumbnail_description">'.utf8_encode($descripcion).'</div>

				</div>';



			}
		}
		closedir($directorio);
	}


}

?>