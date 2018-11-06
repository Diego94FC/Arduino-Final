<?php
	/* Leer el archivo y obtener datos */
			$data = array();
			$i = 0;

			$handle = fopen("values.txt", "r");
			if ($handle) {
				while (($line = fgets($handle)) !== false) {
					$data[$i] = $line;
					$i++;	
				}

				fclose($handle);
			} else {
				// error opening the file.
			}
			$j = 0;
			/*for($j = sizeof($data) - 1; $j >= 0; $j--){
				echo "<br>";
				echo $data[$j];
				echo "<br>";

			} */
			$time = $data[1];
			$distance = $data[0];
			//echo gettype(($distance), "\n";
			//echo ord($distance)."<br>";
			echo $distance."<br>";
			echo $time."<br>";

			echo "#";
			echo pack("c", $distance); // Distancia en cm
			echo pack("c", $time);  // Tiempo en segundos
			echo "#";


?>