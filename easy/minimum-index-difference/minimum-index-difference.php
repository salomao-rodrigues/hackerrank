<?php

function minimumIndexDifference($a, $b, $length)
{
    $difference = $length;
    $diffValue = null;

    for ($i = 0; $i < $length; $i++) {
        $posInB = array_search($a[$i], $b);

        $newDiff = abs($posInB - $i);

        if ($newDiff < $difference) {
            $difference = $newDiff;
            $diffValue = $a[$i];
        } elseif ($newDiff === $difference) {
            $diffValue = isset($diffValue) ? min($diffValue, $a[$i]) : $a[$i];
        }
    }

    return $diffValue;
}

$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%d", $length);

$a_arr = trim(fgets($_fp));
$b_arr = trim(fgets($_fp));

$a_arr = explode(' ', $a_arr);
$b_arr = explode(' ', $b_arr);

echo minimumIndexDifference($a_arr, $b_arr, $length);
