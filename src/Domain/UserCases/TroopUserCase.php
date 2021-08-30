<?php

namespace Empire\Domain\UserCases;

use Empire\Domain\Entities\ArcherSoldier;
use Empire\Domain\Entities\SpearmanSoldier;
use Empire\Domain\Entities\SwordsmanSoldier;
use Empire\Domain\Entities\Troop;
use Empire\Ports\RepositoryInterface;
class TroopUserCase extends MainUserCase{

    public function __construct(RepositoryInterface $repository)
    {
        parent::__construct($repository);   
    }

    public function mount(int $totalSoldiers, int $totalTroops): array
    {
        $troopEntity = new Troop($totalSoldiers, $totalTroops);
        $flag = false;
        $troopsQtdsArray = [];
       
        while($flag == false){
            $troopsQtdsArray = $troopEntity->getTroops();
            $hash = md5(json_encode($troopsQtdsArray));
            if(!$this->repository->get($hash)){
                $this->repository->save($hash, json_encode($troopsQtdsArray));
                $flag = true;
            }
        }

        $troops = [];

        $soldiersTypes = [
            new ArcherSoldier([
                'name' => 'Robi Hood',
                'age' => mt_rand(18,50),
                'gender' => 'male',
                'force' => mt_rand(1,500)
            ]),
            new SpearmanSoldier([
                'name' => 'Adam Warrior',
                'age' => mt_rand(18,50),
                'gender' => 'male',
                'force' => mt_rand(1,500)
            ]),
            new SwordsmanSoldier([
                'name' => 'Leonidas Sparta',
                'age' => mt_rand(18,50),
                'gender' => 'male',
                'force' => mt_rand(1,500)
            ]),
        ];

        foreach ($troopsQtdsArray as $key => $qtd) {
            for ($i=1; $i <= $qtd; $i++) { 
                $soldier = $soldiersTypes[$key];
                $troops[$soldier->getAbility()][] = $soldier->getSoldier();
            }
        }

        return $troops;
    }


}