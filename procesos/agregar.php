<?php
$root = $_SERVER['DOCUMENT_ROOT']."/eHealth/static/php/conexion.php";
include $root;  // Conexi�n tiene la informaci�n sobre la conexi�n de la base de datos.

$hum = $_GET["humedad"]; // el dato de humedad que se recibe aqu� con GET denominado humedad, es enviado como parametro en la solicitud que realiza la tarjeta microcontrolada
$temp = $_GET["temperatura"]; // el dato de temperatura que se recibe aqu� con GET denominado temperatura, es enviado como parametro en la solicitud que realiza la tarjeta microcontrolada
$rain = $_GET["lluvia"];
$ID_TARJ = $_GET["ID_TARJ"];

$mysqli = new mysqli($host, $user, $pw, $db); // Aqu� se hace la conexi�n a la base de datos.

date_default_timezone_set('America/Bogota'); // esta l�nea es importante cuando el servidor es REMOTO y est� ubicado en otros pa�ses como USA o Europa. Fija la hora de Colombia para que grabe correctamente el dato de fecha y hora con CURDATE y CURTIME, en la base de datos.

$fecha = date("Y-m-d");
$hora = date("h:i:s");

$sql1 = "INSERT into datos_medidos (ID_TARJ, temperatura, humedad, fecha, hora, lluvia) VALUES ('$ID_TARJ', '$temp', '$hum', '$fecha', '$hora', $rain)"; // Aqu� se ingresa el valor recibido a la base de datos.
echo "sql1...".$sql1; // Se imprime la cadena sql enviada a la base de datos, se utiliza para depurar el programa php, en caso de alg�n error.
$result1 = $mysqli->query($sql1);
echo "result es...".$result1; // Si result es 1, quiere decir que el ingreso a la base de datos fue correcto.

?>
