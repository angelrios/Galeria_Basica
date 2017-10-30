<?php //permite modificar un registro con los parametros dados

//Incluye archivo de funciones
//Obtiene la ruta y la tabla para la eliminacion
//Conexion con bd
//verifica a que tabla pertenece el registro para ser eliminado


include "funcion.php";


$tabla=$_POST['tabla'];


$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
mysql_select_db("liz",$conexion);



if ($tabla=="imagen")
{

	//los valores viejos
	$ruta=$_POST['ruta'];
	$ruta=utf8_decode($ruta);

	$idi=valor($tabla,"id_imagen","ruta",$ruta);


	//los valores nuevos
	//en la linea 37 se codifica el nombre a ISO-8859-1 para que php pueda procesar la ñ y los acentos
	$album=valor("album","id_album","nombre",$_POST['album']);
	$nombre= utf8_decode($_POST['nombre']);
	$categoria=valor("album","id_categoria","id_album",$album);
	$descripcion=utf8_decode($_POST['descripcion']);
	$estado=$_POST['estado'];





	if ($estado=="A")
	{
		$ruta2="galeria/".$categoria."/".$album."/".str_replace(' ', '', $nombre.".jpg")."";
		rename($ruta, $ruta2);
	}
	else
	{
		$ruta2="galeria/inactivo/".str_replace(' ', '', $nombre.".jpg");
		rename($ruta, $ruta2);
	}

	$sql="UPDATE `".$tabla."` SET `id_categoria` = '".$categoria."', `id_album` = '".$album."', `nombre` = '".$nombre."', `descripcion` = '".$descripcion."', `ruta` = '".$ruta2."', `estado` = '".$estado."'  WHERE `id_imagen` = ".$idi." ;";

	$res = mysql_query($sql,$conexion);



	mysql_close($conexion);

	echo'
	<html>
		<head>
			<meta http-equiv="REFRESH"
			content="0;url=carga_archivos.php">
		</head>
	</html>
	';

}
else

	if ($tabla=="album")
	{
			//los valores viejos
			$ruta=$_POST['ruta'];
			$ida=valor($tabla,"id_album","ruta",$ruta);


			//los valores nuevos
			$categoria=valor("categoria","id_categoria","nombre",$_POST['categoria']);
			$nombre=$_POST['nombre'];
			$ruta2="galeria/".$categoria."/".$ida;
			$desc=$_POST['descripcion'];

			$sql="UPDATE `".$tabla."` SET `id_categoria` = '".$categoria."', `nombre` = '".$nombre."', `descripcion` = '".$desc."', `ruta` = '".$ruta2."'  WHERE `id_album` = ".$ida." ;";

			$res = mysql_query($sql,$conexion);

			rename($ruta, $ruta2);

			mysql_close($conexion);

			echo'
				<html>
					<head>
						<meta http-equiv="REFRESH"
						content="0;url=carga_archivos.php">
					</head>
				</html>
				';

	}
	else

		if ($tabla=="categoria")
		{
			//los valores viejos
			$ruta=$_POST['ruta'];
			$idc=valor($tabla,"id_categoria","ruta",$ruta);


			//los valores nuevos
			$nombre=$_POST['nombre'];
			$desc=$_POST['descripcion'];


			$sql="UPDATE `".$tabla."` SET `nombre` = '".$nombre."', `descripcion` = '".$desc."'  WHERE `id_categoria` = ".$idc." ;";

			$res = mysql_query($sql,$conexion);


			mysql_close($conexion);

			echo'
				<html>
					<head>
						<meta http-equiv="REFRESH"
						content="0;url=carga_archivos.php">
					</head>
				</html>
				';
		}

?>