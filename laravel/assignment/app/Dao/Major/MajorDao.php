<?php
namespace App\Dao\Major;

use App\Models\Major\Major;
use App\Contracts\Dao\Major\MajorDaoInterface;

class MajorDao implements MajorDaoInterface
{
    /**
     * To show majors in  create from
     */
    public function majorList()
    {
        $majors = Major::pluck('name', 'id');
        return $majors;
    }

}