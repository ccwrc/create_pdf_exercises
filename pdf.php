<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    /* 
  'departure' => string '1' (length=1)
  'arrival' => string '4' (length=1)
  'localDepartureTime' => string '11-11-2011 11:11:11' (length=19)
  'length' => string '5' (length=1)
  'price' => string '0.06' (length=4) */
    if (($_POST['departure'] != $_POST['arrival']) 
            && (DateTime::createFromFormat("d-m-Y H:i:s", $_POST['localDepartureTime'])) 
            && ($_POST['price'] > 0) && ($_POST['length'] > 0)) {
        echo "rózne";
    }

    
    
    
}

