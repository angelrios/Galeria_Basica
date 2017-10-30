<?php
//login

//inicia sesion
//obtiene las variables post
//conexion para la base de datos
//consulta
//ejecuta la consulta
//estructura de validacion:
//  si el resultado es correcto, manda a la pagina principal con el login activo
//  sino, no
//cierra la base de datos


include "funcion.php";

session_start();

$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];


$conexion= mysql_connect("localhost","pablo","6545821")or die('No se pudo conectar: ' . mysql_error());
mysql_select_db("liz",$conexion);


$consulta="SELECT * FROM usuario";


$resultado = mysql_query($consulta,$conexion);

mysql_close($conexion);

$val=false;

while($fila=mysql_fetch_array($resultado))
{
    $u=$fila['id_usuario'];
    $c=$fila['contrasena'];
    $n=$fila['nombre'];
    if($usuario==$u && $contrasena==$c)
    {
        $_SESSION['usuario']=$usuario ;
        $_SESSION['contrasena']=$contrasena ;
        $_SESSION['nombre']=$n ;

        $val=true;
        break;
    }
}


if ($val)
{
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
{
    $msj= "Usuario Invalido";
    $back="login.html";
    error($msj,$back);
}


?>