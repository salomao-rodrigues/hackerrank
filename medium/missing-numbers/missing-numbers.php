<?php

function unsetKeys($array, $keys) {
    foreach (array_reverse($keys) as $key) {
        unset($array[$key]);
    }

    return $array;
}

function getMissing($a, $b) {
    $elementsMissing = [];
    while (count($a)) {
        $nextElement = reset($a);

        $aKeys = array_keys($a, $nextElement, true);
        $bKeys = array_keys($b, $nextElement, true);

        if (count($aKeys) < count($bKeys)) {
            $elementsMissing[$nextElement] = $nextElement;
        }

        $a = unsetKeys($a, $aKeys);
    }

    ksort($elementsMissing);

    return $elementsMissing;
}

$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp,"%d",$a_size);

$a_arr = trim(fgets($_fp));
$a_arr = explode(' ',$a_arr);
$a_arr = array_map('intval', $a_arr);
fscanf($_fp,"%d",$b_size);

$b_arr = trim(fgets($_fp));
$b_arr = explode(' ',$b_arr);
$b_arr = array_map('intval', $b_arr);

echo implode(' ', getMissing($a_arr, $b_arr));