<?php //Crea los album de imagenes

//Incluye archivo de funciones
//Conexion con la bd
//Obtiene el id_categoria
//crea el registro del album
//obtiene el id_album, crea la ruta y la añade al registro
//verifica si la galeria ya existe, sino la crea y regresa a la pagina principal

include "funcion.php";


$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
mysql_select_db("liz",$conexion);


$idc=valor("categoria","id_categoria","nombre",$_POST['categoria']);


$sql="
INSERT INTO album
(id_album, id_categoria, nombre, descripcion, ruta)
VALUES 
('','".$idc."','".$_POST['nombre']."','".$_POST['descripcion']."','')
";
mysql_query($sql,$conexion);



$numero=valor("album","id_album","nombre",$_POST['nombre']);
$estructura = 'galeria/'.$idc.'/'.$numero;
$sql0="UPDATE `album` SET `ruta` = '".$estructura."' WHERE `album`.`id_album` =".$numero." ";
mysql_query($sql0,$conexion);



if (file_exists($estructura)) 
{

    $msj= "El album ".$_POST['nombre']." existe";  
    $back="carga_archivos.php";
    error($msj,$back);
} 

else 
   	
	if(!mkdir($estructura, 0777, true)) 
	{
	    $msj= "Fallo al crear el album";
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