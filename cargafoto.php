<?php //Permite subir la imagen en el servidor

//Incluye archivo de funciones
//Obtiene el valor exacto de la ruta del album
//Crea el archivo de validacion para verificar si el archivo es una imagen valida
//verifica que se cargo el archivo (comprueba que la variable no es null)


include "funcion.php";

$ruta=valor("album","ruta","nombre",$_POST['categoria']);

$validacion=true;

if ( isset($_FILES['imagen']) )
{

	//cuenta la cantidad de ficheros cargados
	$cantidad= count($_FILES["imagen"]["tmp_name"]);

	//recorre todos los ficheros subidos
	for ($i=0; $i<$cantidad; $i++)
	{
		//Comprobamos si el fichero es una imagen
		if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg')
		{

			//si la imagen ya existe se sale
			if(file_exists ( $ruta."/".$_FILES["imagen"]["name"][$i] ))
			{

				$msj= "Archivo ya existe";
	    		$back="carga_archivos.php";
	    		error($msj,$back);
			}
			else
			{

				//nombre del archivo sin espacios en blanco
				$nombre= str_replace(' ', '', $_FILES["imagen"]["name"][$i]);

				//Subimos el fichero al servidor
				//move_uploaded_file(archivo temporal de la  imagen, ruta y nombre para asignar al archivo temporal);
				move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $ruta."/".$nombre);


				//conexion con la BD
				$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
				mysql_select_db("liz",$conexion);


				// query para tener el id_categoria de la album
				$sql0="SELECT id_categoria FROM `album` WHERE nombre= '".$_POST['categoria']."';";

				// query para tener el id_album de la album
				$sql1="SELECT id_album FROM `album` WHERE nombre= '".$_POST['categoria']."';";


				// $idc tiene el valor exacto del id_categoria en un vector
				$idc=mysql_fetch_array(mysql_query($sql0 ,$conexion));

				// $ida tiene el valor exacto del id_album en un vector
				$ida=mysql_fetch_array(mysql_query($sql1 ,$conexion));



				$sql="
				INSERT INTO imagen
				(id_imagen, id_categoria, id_album, nombre, descripcion, ruta)
				VALUES
				('','".$idc[0]."','".$ida[0]."','".$_FILES["imagen"]["name"][$i]."','".$_POST['descripcion'].
				"','".$ruta."/".$nombre."')
				";


				mysql_query($sql,$conexion);

				mysql_close($conexion);

			}
		}
		//si el fichero no es una imagen:
		else
		{
			$msj= "El archivo ".$_FILES["imagen"]["name"][$i]." no es una imagen valida y no pudo ser cargado";
    		$back="carga_archivos.php";
    		error($msj,$back);
		}

	}

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