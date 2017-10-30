<?php

//Conexion con el servidor a travez del usuario
$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());

//conexion con la base de datos
mysql_select_db("liz",$conexion);


$sitio=$_POST['sitio'];
$pagina=$_POST['pagina'];

$sql="UPDATE `redsocial` SET `pagina` = '".$pagina."' WHERE `nombre` = '".$sitio."'";

mysql_query($sql, $conexion);

echo'
			<html>
				<head>
					<meta http-equiv="REFRESH"
					content="0;url=carga_archivos.php">
				</head>
			</html>
			';
?>