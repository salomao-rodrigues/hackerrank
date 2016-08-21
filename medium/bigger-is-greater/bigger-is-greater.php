<?php

function getSubsetPosition($string) {
  $i = strlen($string) - 1;
  while ($i > 0 && $string[$i-1] >= $string[$i]) {
    $i -= 1;
  }

  return $i;
}

function getNextGreaterCharPosition($target, $subset) {
  $nextGreater = null;
  $position = null;

  for ($i = 0; $i < strlen($subset); $i += 1) {
    if (!$nextGreater || ($subset[$i] > $target && $subset[$i] < $nextGreater)) {
      $nextGreater = $subset[$i];
      $position = $i;
    }
  }

  return $position;
}

function getGreater($string) {
  $i = getSubsetPosition($string);

  if ($i === 0) {
    return 'no answer';
  }

  $subset = substr($string, $i);

  $switchWith = getNextGreaterCharPosition($string[$i-1], $subset);

  $toSwitch = $string[$i-1];
  $string[$i-1] = $subset[$switchWith];
  $subset[$switchWith] = $toSwitch;
  
  $subsetArray = str_split(strrev($subset));

  sort($subsetArray);

  return substr_replace(
    $string,
    implode('', $subsetArray),
    $i
  );
}


$_fp = fopen("php://stdin", "r");

fscanf($_fp, "%d", $count);

for ($i=0; $i < $count; $i++) { 
  $string = trim(fgets($_fp));
  echo getGreater($string)."\n";
}
