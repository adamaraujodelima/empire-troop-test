<?php

namespace Empire\Domain\Entities;

class Troop {

    private Int $totalSoldiers;
    private Int $totalTroops;
    private Array $troops;

    public function __construct(Int $totalSoldiers, Int $totalTroops)
    {
        $this->troops = [];
        $this->totalTroops = $totalTroops;
        $this->totalSoldiers = $totalSoldiers;
    }
    
    public function divideTroops()
    {
        $cont = 0;        
        $percent = 100;       
        
        while ($percent > 0) {
        
            $percentPart = mt_rand(1, $percent); // Choose a number between 1 and number of percent variable
        
            if ($percentPart < 100) { // The troop cannot be with all soldiers of same skill
                $percent -= $percentPart; // decrease percent variable to not allowed code rand number with the same value
                $this->troops[] = $percentPart; //
            }
        
            // If the loop achieve the number of troops, increase the last troop with rest of percentage to stop code here in loop
            if (count($this->troops) == $this->totalTroops && array_sum($this->troops) < 100) {
                $this->troops[$this->totalTroops - 1] += $percent;
                $percent = 0;
            }
        }
        
        // If number of troops calculated in while is smaller than number of totalTroops
        // Get the troop with max soldiers and decrease diference to put one soldier in missing troops
        if (count($this->troops) < $this->totalTroops) {
            $max = max($this->troops); // get max soldier for a troop in troops
            $key = array_search($max, $this->troops); // get the index for replace after
            $missing = $this->totalTroops - count($this->troops); // calculate diference missing troops from totalTroops
            $rest = $max - $missing; // decrease from the max soldiers the diference of missing troops
            $this->troops[$key] = $rest; // replace the number soliders of troop with the result of calculation
            for ($i = 0; $i < $missing; $i++) {
                $this->troops[] = 1; // mount the rest of missing troops with one soldier in each troop to achieve the totalTroops
            }
        }
        
    }

    public function getTroops()
    {
        return $this->troops;
    }
}

