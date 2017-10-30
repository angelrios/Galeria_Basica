<?php //Permite subir El logo en el servidor

//Incluye archivo de funciones
//Obtiene el valor exacto de la ruta del album
//Crea el archivo de validacion para verificar si el archivo es una imagen valida
//verifica que se cargo el archivo (comprueba que la variable no es null)


include "funcion.php";


$validacion=true;

if ( isset($_FILES['imagen']) )
{

	//Comprobamos si el fichero es una imagen
	if ($_FILES['imagen']['type']=='image/png' || $_FILES['imagen']['type']=='image/jpeg')
	{



		//ruta del logo
		$ruta= "img/logo.png";

		//borramos el logo anterior
		unlink($ruta);

		//Subimos el logo al servidor
		//move_uploaded_file(archivo temporal de la  imagen, ruta y nombre para asignar al archivo temporal);
		move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);



	}
	//si el fichero no es una imagen:
	else
	{

		$msj= "El archivo ".$_FILES["imagen"]["name"][$i]." no es una imagen valida y no pudo ser cargado";
		$back="carga_archivos.php";
		error($msj,$back);

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