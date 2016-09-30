<?php

function exchangeWrappers($nWrappers, $neededWrappers) {
    if ($neededWrappers > $nWrappers) {
        return 0;
    }

    $ate = floor($nWrappers / $neededWrappers);

    $wrappersLeft = $ate + $nWrappers - ($neededWrappers * $ate);

    return $ate + exchangeWrappers($wrappersLeft, $neededWrappers);
}

function maxCupcakesTrip($trip) {
    list($spent, $cupcakeCost, $neededWrappers) = explode(' ', $trip);

    $ate = floor($spent / $cupcakeCost);

    return $ate + exchangeWrappers($ate, $neededWrappers);
}

function maximumCupcakes($trips) {
    foreach ($trips as $trip) {
        echo maxCupcakesTrip($trip)."\n";
    }
}


$__fp = fopen("php://stdin", "r");

$_trips_cnt = 0;
fscanf($__fp, "%d", $_trips_cnt);
$_trips = array();
for ($_trips_i=0; $_trips_i < $_trips_cnt; $_trips_i++) {
$_trips_item = fgets($__fp);
$_trips_item = trim($_trips_item);
$_trips[] = $_trips_item;
}

maximumCupcakes($_trips);
