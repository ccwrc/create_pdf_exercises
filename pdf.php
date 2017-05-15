<?php

require_once './vendor/autoload.php';
require_once 'includes/airports.php';
use NumberToWords\NumberToWords;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (($_POST['departure'] != $_POST['arrival']) 
            && (DateTime::createFromFormat("d-m-Y H:i:s", $_POST['localDepartureTime'])) 
            && ($_POST['price'] > 0) && ($_POST['length'] > 0) && is_numeric($_POST['departure']) 
            && is_numeric($_POST['arrival'])) {

        $departure = (int) $_POST['departure'];
        $departureTimezone = new DateTimeZone($airports[$departure]['timezone']);
        $departureName = $airports[$departure]['name'];
        $departureCode = $airports[$departure]['code'];        
        
        $arrival = (int) $_POST['arrival'];
        $arrivalTimezone = new DateTimeZone($airports[$arrival]['timezone']);
        $arrivalName = $airports[$arrival]['name'];
        $arrivalCode = $airports[$arrival]['code'];
        
        $localTime = $_POST['localDepartureTime'];
        $flightTime = $_POST['length'];
        $price = new NumberToWords();
        $currTrans = $price->getCurrencyTransformer('pl');
        $displayPrice = $currTrans->toWords($_POST['price'] * 100, 'PLN');

        $dateDeparture = new DateTime();
        $dateDeparture->setTimezone($departureTimezone);
        $dateDeparture->modify($localTime);
        $displayDateDeparture = $dateDeparture->format('d.m.Y H:i:s');
        
        $dateArrival = new DateTime();
        $dateArrival->setTimezone($departureTimezone);
        $dateArrival->modify($localTime . "+" . $flightTime . "hours");
        $dateArrival->setTimezone($arrivalTimezone);
        $displayDateArrival = $dateArrival->format('d.m.Y H:i:s');
        
        $faker = Faker\Factory::create();
        $name = $faker->firstName('female');
        $surname = $faker->lastName;
     
        $displayReservation = "
        <html>
            <body>   
                <table border=\"1\">
                    <tr>
                        <td>Lotnisko wylotu</td>
                        <td>Czas wylotu</td>
                        <td>Kod lotniska </td>
                        <td>Lotnisko docelowe</td>
                        <td>Czas przybycia (wg. docelowej strefy czasowej)</td>
                        <td>Kod lotniska</td>
                        <td>Czas lotu</td>
                        <td>Cena lotu</td>
                    </tr>

                    <tr>
                        <td>$departureName</td>
                        <td>$displayDateDeparture</td>
                        <td>$departureCode</td>
                        <td>$arrivalName</td>
                        <td>$displayDateArrival</td>
                        <td>$arrivalCode</td>
                        <td>godzin: $flightTime</td>
                        <td>$displayPrice</td>
                    </tr>
                </table> 
                
                <br/>
                Imię: $name <br/>
                Nazwisko: $surname <br/><br/><br/>
                    
                <center><img src=\"img/airlinesLogo.jpg\"></center>
            </body>
        </html>
        ";
        
        $mpdf = new mPDF();
        $mpdf->WriteHTML($displayReservation);
        $mpdf->Output("twoja_rezerwacja.pdf", "D");

    } else {
        echo "Nie wypełniłeś poprawnie formularza <br/><br/>";
        echo "<a href=\"index.php\">Wróć do poprzedniej strony</a>";
    }
}



