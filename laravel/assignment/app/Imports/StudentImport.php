<?php

namespace App\Imports;

use App\Models\Student\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'address'    => $row['address'], 
            'major_id'    => $row['major_id'], 
            'created_at'    => $row['created_at'],   
            //
        ]);
    }
}
