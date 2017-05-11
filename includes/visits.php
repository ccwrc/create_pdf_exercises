<?php

if (!isset($_COOKIE['visits'])) {
    setcookie('visits', 1, time() + 3600 * 24 * 365); // rok waznosci
    echo "Witaj pierwszy raz na stronie <br/>";
} else {
    $visit = $_COOKIE['visits'];
    echo "Witaj, odwiedziłeś nas już " . $visit++ . " razy! <br/>";
    setcookie('visits', $visit, time() + 3600 * 24 * 365);
}

