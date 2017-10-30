<?php

	//Script para la creacion de las tablas, la base de dato debe ser previamente creada y los datos del servidor, usuario y contraseña deben ser colocados en los comandos "mysql_connect" dentro del proyecto

	//para conectarse a la BD: servidor, usuario, contraseña
	$conexion= mysql_connect("localhost","pablo","6545821") or die("No se ha podido conectar ".mysql_error());


	//Se crea la base de datos con el comando en mysql_query y la variable de conexion
	if (mysql_query("CREATE DATABASE liz",$conexion))
	{
		//si al crear la base de datos no hay error:
		echo "Se creo la bd :D";
	}
	//si no se puede crear la base de datos
	else
	{
		echo "no se pudo  :( ".mysql_error();
	}




	//Seleccion la base de dato en especifico
	mysql_select_db("liz",$conexion);



	//Crea la tabla usuario
	$sql= " CREATE TABLE usuario
	( 	`id_usuario` VARCHAR(15) NOT NULL,
		PRIMARY KEY(id_usuario),
		`nombre` VARCHAR(15) NOT NULL ,
		`contrasena` VARCHAR(15) NOT NULL
	)";


	//crea la tabla categoria
	$sql2= " CREATE TABLE categoria
	( 	`id_categoria` INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id_categoria),
		`nombre` VARCHAR(50) NOT NULL,
		`descripcion` VARCHAR(200),
		`ruta` VARCHAR(100)

	)";


	//Crea la tabla album
	$sql3= " CREATE TABLE album
	( 	`id_album` INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id_album),
		`id_categoria`INT NOT NULL,
		FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
		`nombre` VARCHAR(50) NOT NULL ,
		`descripcion` VARCHAR(200),
		`ruta` VARCHAR(100)
	)";

	//crea la tabla imagen
	$sql4= " CREATE TABLE imagen
	( 	`id_imagen` INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id_imagen),
		`id_categoria`INT NOT NULL,
		FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
		`id_album`INT NOT NULL,
		FOREIGN KEY (id_album) REFERENCES album(id_album),
		`nombre` VARCHAR(50) NOT NULL,
		`ruta` VARCHAR(100)
	)";



	/*ejecuto la peticion (query)*/
	mysql_query($sql,$conexion);
	mysql_query($sql2,$conexion);
	mysql_query($sql3,$conexion);
	mysql_query($sql4,$conexion);



	//trminar la conexion  al finalizar el scrip
	mysql_close($conexion);


?>