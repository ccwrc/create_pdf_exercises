<?php
// https://packagist.org/packages/mpdf/mpdf

// https://github.com/mpdf/mpdf

// obiekt Mpdf: $mpdf = new mPDF(); (na repozytorium jest informacja o tworzeniu 
// obiektu dla starej wersji biblioteki)
// https://mpdf.github.io/getting-started/creating-your-first-file.html

// full manual
// https://mpdf.github.io/

// output
// https://mpdf.github.io/reference/mpdf-functions/output.html

// !! real life examp.
// https://github.com/mpdf/mpdf-examples

require_once '../vendor/autoload.php';

$mpdf = new mPDF();
//$mpdf->WriteHTML('<h1>Hello world again!</h1>');
//$mpdf->Output(); plik otwiera sie jako mpdf.pdf

//$html = "
//<h1>twoja nazwa</h1>
//<hr/> powyżej zwykła linia <br/>
//<a href=\"http://www.silentpcreview.com/\">link silent</a> <br/>
//<p>paragraf i poniżej obrazek</p>
//<img src=\"../img/airlinesLogo.jpg\"/>
//najzwyklejszy tekst
//";

// pdf + swiftmailer
// https://mpdf.github.io/real-life-examples/e-mail-a-pdf-file.html

// zależne
// http://www.fpdf.org/


$mpdf->WriteHTML($html);
$mpdf->Output();
