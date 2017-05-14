<?php

require_once './vendor/autoload.php';
include 'includes/airports.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (($_POST['departure'] != $_POST['arrival']) 
            && (DateTime::createFromFormat("d-m-Y H:i:s", $_POST['localDepartureTime'])) 
            && ($_POST['price'] > 0) && ($_POST['length'] > 0) && is_numeric($_POST['departure']) 
            && is_numeric($_POST['arrival'])) {
        /* 'name'     => 'Chicago Rockford International Airport',
          'code'     => 'RFD',
          'timezone' => 'America/Chicago', */
        $departure = (int) $_POST['departure'];
        $departureTimezone = new DateTimeZone($airports[$departure]['timezone']);
        $arrival = (int) $_POST['arrival'];
        $arrivalTimezone = new DateTimeZone($airports[$arrival]['timezone']);

        $localTime = $_POST['localDepartureTime'];
        $flightTime = $_POST['length'];

        $dateDeparture = new DateTime();
        $dateDeparture->setTimezone($departureTimezone);
        $dateDeparture->modify($localTime);
        $dateDeparture->format('d.m.Y H:i:s');
        var_dump($dateDeparture);
        $dateArrival = new DateTime();
        $dateArrival->setTimezone($departureTimezone);
        $dateArrival->modify($localTime . "+" . $flightTime . "hours");
        $dateArrival->setTimezone($arrivalTimezone);
        $dateArrival->format('d.m.Y H:i:s');

        var_dump($dateArrival);
        
        
        
    }
}

