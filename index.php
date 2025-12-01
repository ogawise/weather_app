<?php

echo "Enter your city: ";
$city = trim(fgets(STDIN));

$apiKey= "1adacde1b569337c60c1d87e3eb40ae8";
$url = "https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=".$apiKey."&units=metric";

$response = file_get_contents($url);

$data = json_decode($response, true);

if (!isset($data['cod']) || $data['cod'] != 200) {
    echo "API Error: " . ($data['message'] ?? "Unknown error") . "\n";
    exit;
}


$temp = $data['main']['temp'];
$humidity = $data['main']['humidity'];

echo "\n Weather in $city: \n";
echo "Temperature : $temp C \n";
echo "Humidity: $humidity%\n";