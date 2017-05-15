<?php
// https://packagist.org/packages/kwn/number-to-words

// https://github.com/kwn/number-to-words

// instalacja - composer
//{
//    "require": {
//        "kwn/number-to-words": "~1.2.0"
//    }
//}

require_once '../vendor/autoload.php';
use NumberToWords\NumberToWords;

$numberToWords = new NumberToWords();
$numberTransformer = $numberToWords->getNumberTransformer('en');

// echo $numberTransformer->toWords(3255);
// three thousand two hundred fifty-five

$currencyTransformer = $numberToWords->getCurrencyTransformer('pl');
// echo $currencyTransformer->toWords(5099, 'USD');
// pięćdziesiąt dolarów dziewięćdziesiąt dziewięć centów

// echo $currencyTransformer->toWords(667, 'PLN');
// sześć złotych sześćdziesiąt siedem groszy

/* Bare in mind, the currency transformer accepts integers as the amount to transform. 
 * It means that if you store amounts as floats (e.g. 4.99) you need to multiply them by 
 * 100 and pass the integer (499) as an argument. */

// echo $currencyTransformer->toWords(669.44 * 100, 'PLN');
// sześćset sześćdziesiąt dziewięć złotych czterdzieści cztery grosze