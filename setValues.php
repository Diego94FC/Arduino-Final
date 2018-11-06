<?php

$time = $_GET['time'];
$distance = $_GET['distance'];

    $fichero = 'values.txt';
	// Abre el fichero para obtener el contenido existente
	//$actual = file_get_contents($fichero);
	// Añade una nueva persona al fichero
	//$actual .= $_GET['tmp']."\n";
	// Escribe el contenido al fichero
	$actual = $distance."\n".$time;
	file_put_contents($fichero, $actual);
	echo "Valores Actualizados Correctamente";
	echo "<br>";
	echo "Los cambios se aplicarán la próxima vez que se active su timbre";
	echo "<br>";
  echo "<br>";
  echo "<a href=\"index.html\">Volver $x</a>";

    //header("Location: index.html");
    //die();
?>
