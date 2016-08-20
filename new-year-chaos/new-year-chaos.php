<?php
//https://www.hackerrank.com/challenges/new-year-chaos

function moveElement(&$array, $from, $to)
{
    //Ugly solution, but array_splice was taking too long to compute
    $diff = $to - $from;
    $tempFrom = $array[$from];
    $tempTo = $array[$to];

    $array[$to] = $tempFrom;
    if ($diff === 2) {
        $array[$from] = $array[$to-1];
        $array[$to-1] = $tempTo;
    } else {
        $array[$from] = $tempTo;
    }
}

function getDistance($arr, $pos)
{
    $number = $pos + 1;

    for ($i = 0; $i <= 2 || ($pos - $i) < 0; $i += 1) {
        if ($arr[$pos - $i] === $number) {
            return $i;
        }
    }

    return -1;
}

function getMinPermutations($queue) {
    $permutations = 0;

    for ($i = count($queue) - 1; $i > 0; $i -= 1) {
        $distance = getDistance($queue, $i);
        if ($distance === -1) {
            return 'Too chaotic';
        }

        $permutations += $distance;

        if ($distance > 0 ) {
            moveElement($queue, $i-$distance, $i);
        }
    }

    return $permutations;
}

$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$T);
for($a0 = 0; $a0 < $T; $a0++){
    fscanf($handle,"%d",$n);
    $q_temp = trim(fgets($handle));
    $q = explode(' ',$q_temp);
    $q = array_map('intval', $q);

    echo getMinPermutations($q)."\n";
}
