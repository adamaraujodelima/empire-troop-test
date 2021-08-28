<?php

$total = 1000;
$cont = 0;
$troops = 5;
$percent = 100;
$parts = [];

while ($percent > 0) {

    $percentPart = mt_rand(1,$percent);

    if($percentPart < 100){
        echo $percentPart . ' - ';
        $percent -= $percentPart;
        $parts[] = $percentPart;
    }

    if(count($parts) == $troops && array_sum($parts) < 100){
        $parts[$troops-1] += $percent;
        $percent = 0;
    }

}

$hash = md5(json_encode($parts));

if(count($parts) < $troops){
    $max = max($parts);
    $key = array_search($max, $parts);
    $missing = $troops - count($parts);
    $rest = $max - $missing;
    $parts[$key] = $rest;
    for ($i=0; $i < $missing; $i++) { 
        $parts[] = 1;
    }
}

print_r($parts);
print_r(array_sum($parts));
