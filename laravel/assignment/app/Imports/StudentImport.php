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
            'dob'      =>$this->transformDate($row['dob']),
            'address'  => $row['address'], 
            'major_id' => $row['major_id'],  
            //
        ]);
    }

    public function transformDate($value, $format = 'Y/m/d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value)->format('y/m/d');
        }
    }
}
