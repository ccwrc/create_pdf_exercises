<?php
// https://packagist.org/packages/fzaninotto/faker

// https://github.com/fzaninotto/Faker

require_once '../vendor/autoload.php';

$faker = Faker\Factory::create();

// echo $faker->name;

// echo $faker->address;
// 4486 Rosella Flats Apt. 758 Pollichchester, NM 55591-3686

// echo $faker->text;
// Maiores ipsum cumque error aspernatur asperiores numquam. Est id illum et et sunt 
// nihil voluptas. Iure suscipit sit quae aut quos quam. Provident voluptatum ab at 
// sint commodi reprehenderit non.

//for ($i = 0; $i < 15; $i++) {
//    echo $faker->firstName . " " . $faker->lastName . "<br/>";
//}

// echo $faker->text(700);

// echo $faker->paragraph(33);

// echo $faker->city;

// var_dump($faker->dateTimeThisDecade);

// echo $faker->email;

// echo $faker->hexColor;

//$pic = $faker->imageUrl(300, 400, "abstract", true);
//echo "<img src=\"$pic\">";
// kategorie: http://lorempixel.com/

$faker->addProvider(new Faker\Provider\pl_PL\Company($faker));
echo $faker->regon;































