<?php //permite eliminar un registro con los parametros dados

//Incluye archivo de funciones
//Obtiene la ruta y la tabla para la eliminacion
//Conexion con bd
//verifica a que tabla pertenece el registro para ser eliminado


include "funcion.php";

$ruta=$_GET['ruta'];


$ruta=utf8_decode($ruta);


$tabla=$_GET['tabla'];


$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
mysql_select_db("liz",$conexion);



if ($tabla=="imagen")
{
	$sql="DELETE FROM ".$tabla." WHERE ruta='".$ruta."'";
	$res = mysql_query($sql,$conexion);


	mysql_close($conexion);


	chown($ruta, 666);
	unlink ($ruta);


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
		//obtiene el id_album
		$ida= valor($tabla,"id_album","ruta",$ruta);

		//borra todas las imagenes del album
		$sql0="DELETE FROM imagen WHERE id_album='".$ida."'";
		$res0 = mysql_query($sql0,$conexion);

		//borra el album
		$sql="DELETE FROM ".$tabla." WHERE ruta='".$ruta."'";
		$res = mysql_query($sql,$conexion);


		mysql_close($conexion);


		eliminarDir($ruta);

	/*
		echo'
		<html>
			<head>
				<meta http-equiv="REFRESH"
				content="0;url=carga_archivos.php">
			</head>
		</html>
		';
	*/
	}
	else

		if ($tabla=="categoria")
		{
			//obtiene el id_categoria
			$idc= valor($tabla,"id_categoria","ruta",$ruta);

			//borra todas las imagenes de la categoria
			$sql0="DELETE FROM imagen WHERE id_categoria='".$idc."'";
			$res0 = mysql_query($sql0,$conexion);

			//borra todas los album de la categoria
			$sql1="DELETE FROM album WHERE id_categoria='".$idc."'";
			$res1 = mysql_query($sql1,$conexion);

			//borra el categoria
			$sql="DELETE FROM ".$tabla." WHERE ruta='".$ruta."'";
			$res = mysql_query($sql,$conexion);


			mysql_close($conexion);


			eliminarDir($ruta);

		/*
			echo'
			<html>
				<head>
					<meta http-equiv="REFRESH"
					content="0;url=carga_archivos.php">
				</head>
			</html>
			';
		*/
		}

?>