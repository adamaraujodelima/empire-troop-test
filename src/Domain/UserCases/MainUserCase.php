<?php

namespace Empire\Domain\UserCases;

use Empire\Ports\RepositoryInterface;

class MainUserCase {
    
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository =$repository;
    }

}