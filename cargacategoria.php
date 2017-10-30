<?php //Crea la categoria en la bd y en el servidor

//Incluye archivo de funciones
//Conexion con la bd
//Crea y ejecuta el query para agregar la categoria a la bd
//Obtiene el identificador del registro, crea la ruta y la añade a la bd
//verifica si la galeria ya existe, sino la crea y regresa a la pagina principal


include "funcion.php";


$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
mysql_select_db("liz",$conexion);


$sql="
INSERT INTO categoria
(id_categoria, nombre, descripcion, ruta)
VALUES ('','".$_POST['nombre']."','".$_POST['descripcion']."','')
";
mysql_query($sql,$conexion);


$numero=valor("categoria","id_categoria","nombre",$_POST['nombre']);
$estructura = 'galeria/'.$numero;
$sql0="UPDATE `categoria` SET `ruta` = '".$estructura."' WHERE `categoria`.`id_categoria` =".$numero." ";
mysql_query($sql0,$conexion);


if (file_exists($estructura)) 
{

    $msj= "La categoria ".$_POST['nombre']." existe";  
    $back="carga_archivos.php";
    error($msj,$back);
} 

else 
   	
	if(!mkdir($estructura, 0777, true)) 
	{
	    $msj= "Fallo al crear la categoria";
    	$back="carga_archivos.php";
    	error($msj,$back);
	}
	
	
		
mysql_close($conexion);

echo'
<html>
	<head>
		<meta http-equiv="REFRESH"
		content="0;url=carga_archivos.php">
	</head>
</html>
';

?>