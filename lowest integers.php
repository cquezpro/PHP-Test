<?php
//Code Test: Use PHP to output the lowest 10 positive integers where the sum of the digits of each integer equals 10 and contains the number 7 as one of the digits. Proposals without this question completed will not be considered.

function sum($num) { 
  $sum = 0; 
  for ($i = 0; $i < strlen($num); $i++){ 
    $sum += $num[$i]; 
  } 
  return $sum; 
}

function sampling($chars, $size, $combinations = array()) {
  # in case of first iteration, the first set of combinations is the same as the set of characters
  if (empty($combinations)) {
    $combinations = $chars;
  }
  # size 1 indicates we are done
  if ($size == 1) {
    $digits = array();
    foreach ($combinations as $num) {
      if ((substr($num, 0, 1) !== '0') && (sum($num) == 10)) {
        $digits[] = $num;
    }
    }
    sort($digits);
    return $digits;
  }
  # initialise array to put new values into it
  $new_combinations = array();
  # loop through the existing combinations and character set to create strings
  foreach ($combinations as $combination) {
      foreach ($chars as $char) {
    $new_combinations[] = $combination . $char;
      }
  }
  # call the same function again for the next iteration as well
  return sampling($chars, $size - 1, $new_combinations);
}
$chars = array(7, 0, 1, 2, 3);
$output2 = sampling($chars, 2);
$output3 = sampling($chars, 3);

$output = $output2;
$output = array_merge($output, $output3);
//echo count($output);

if(count($output)>=10) {
	for($i = 0; $i < 10; $i++) {
		echo ($i+1) . ": " . $output[$i] . "\r";
	}
}
//var_dump($output);
?>