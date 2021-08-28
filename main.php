<?php

$total = 1000;
$cont = 0;
$maxTroops = 5;
$percent = 100;
$troops = [];

while ($percent > 0) {

    $percentPart = mt_rand(1,$percent); // Choose a number between 1 and number of percent variable

    if($percentPart < 100){ // The troop cannot be with all soldiers of same skill
        $percent -= $percentPart; // decrease percent variable to not allowed code rand number with the same value
        $troops[] = $percentPart; //
    }

    // If the loop achieve the number of troops, increase the last troop with rest of percentage to stop code here in loop
    if(count($troops) == $maxTroops && array_sum($troops) < 100){
        $troops[$maxTroops-1] += $percent;
        $percent = 0;
    }

}

// If number of troops calculated in while is smaller than number of maxTroops
// Get the troop with max soldiers and decrease diference to put one soldier in missing troops
if(count($troops) < $maxTroops){
    $max = max($troops); // get max soldier for a troop in troops
    $key = array_search($max, $troops); // get the index for replace after
    $missing = $maxTroops - count($troops); // calculate diference missing troops from maxTroops
    $rest = $max - $missing; // decrease from the max soldiers the diference of missing troops
    $troops[$key] = $rest; // replace the number soliders of troop with the result of calculation
    for ($i=0; $i < $missing; $i++) { 
        $troops[] = 1; // mount the rest of missing troops with one soldier in each troop to achieve the maxTroops
    }
}

$hash = md5(json_encode($troops)); // Hash of percentage of troops to store in memory and validate if the combination was used in other calls.

print_r($troops);
print_r(array_sum($troops));
