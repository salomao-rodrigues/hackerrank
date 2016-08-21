<?php
//https://www.hackerrank.com/challenges/a-very-big-sum
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$arr_temp = fgets($handle);
$arr = explode(" ",$arr_temp);
array_walk($arr,'intval');

echo array_reduce($arr, function ($carry, $element) { return $carry + $element; }, 0);
