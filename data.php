<?php

$temps = [];
$temps['Berlin'] = 14;
$temps['Phuket'] = 30;
$temps['Palma'] = 16;
$temps['Santorini'] = 25;


$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
if (is_string($city)) {
 echo $temps[$city];
}


