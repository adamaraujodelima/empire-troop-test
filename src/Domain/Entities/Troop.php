<?php

namespace Empire\Domain\Entities;

use Exception;

class Troop {

    private int $totalSoldiers;
    private int $totalTroops;

    public function __construct(Int $totalSoldiers, Int $totalTroops)
    {
        if($totalSoldiers <= 1)
            throw new Exception("The number of total soldiers must be greather than 1", 1);

        if(!$totalTroops)
            throw new Exception("The number of total troops must be greather than 0", 1);
            
        $this->totalTroops = $totalTroops;
        $this->totalSoldiers = $totalSoldiers;
    }
    
    private function calculateTroops(): array
    {
        $totalSoldiers = $this->totalSoldiers;
        $troops = [];

        while ($totalSoldiers > 0) {
        
            $soldiers = mt_rand(1, $totalSoldiers); // Choose a number between 1 and number of percent variable
        
            if ($soldiers < $this->totalSoldiers) { // The troop cannot be with all soldiers of same skill
                $totalSoldiers -= $soldiers; // decrease percent variable to not allowed code rand number with the same value
                $troops[] = $soldiers; //
            }
        
            // If the loop achieve the number of troops, increase the last troop with rest of percentage to stop code here in loop
            if (count($troops) == $this->totalTroops && array_sum($troops) < $this->totalSoldiers) {
                $troops[$this->totalTroops - 1] += $totalSoldiers;
                $totalSoldiers = 0;
            }
        }
        
        // If number of troops calculated in while is smaller than number of totalTroops
        // Get the troop with max soldiers and decrease diference to put one soldier in missing troops
        if (count($troops) < $this->totalTroops) {
            $max = max($troops); // get max soldier for a troop in troops
            $key = array_search($max, $troops); // get the index for replace after
            $missing = $this->totalTroops - count($troops); // calculate diference missing troops from totalTroops
            $rest = $max - $missing; // decrease from the max soldiers the diference of missing troops
            $troops[$key] = $rest; // replace the number soliders of troop with the result of calculation
            for ($i = 0; $i < $missing; $i++) {
                $troops[] = 1; // mount the rest of missing troops with one soldier in each troop to achieve the totalTroops
            }
        }

        return $troops;
        
    }

    public function getTroops(): array
    {
        return $this->calculateTroops();
    }
}

