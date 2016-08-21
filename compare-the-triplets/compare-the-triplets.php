<?php

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d %d",$a0,$a1,$a2);
fscanf($handle,"%d %d %d",$b0,$b1,$b2);

$results = [
    $a0 - $b0,
    $a1 - $b1,
    $a2 - $b2,
];

$player1 = array_reduce($results, function ($carry, $result) {
   return $carry + ($result > 0 ? 1 : 0);
}, 0);

$player2 = array_reduce($results, function ($carry, $result) {
   return $carry + ($result < 0 ? 1 : 0);
}, 0);

echo "$player1 $player2";
