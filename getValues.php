<?php
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
    echo json_encode($data);


 ?>
