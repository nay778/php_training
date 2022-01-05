<?php

namespace App\Services\Major;

use App\Contracts\Dao\Major\MajorDaoInterface;
use App\Contracts\Services\Major\MajorServiceInterface;

class MajorService implements MajorServiceInterface
{
    private $majorDao;

    public function __construct(MajorDaoInterface $majorDaoInterface)
    {
        $this->majorDao = $majorDaoInterface;
    }

    /**
    * To show majors in  create from
    */
    public function majorList()
    {
        return $this->majorDao->majorList();
    }
}
