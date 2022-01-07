<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection,  WithHeadings, WithEvents, WithMapping
{
    public $studentInterface;
    public function __construct(StudentDaoInterface $studentDaoInterfae)
    {
        $this->studentInterface = $studentDaoInterfae;
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->studentInterface->studentListExport();
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        return [
            'Name',
            'Email',
            'Major',
            'DOB',
            'Address',
            'Created_at',
            'Updated_at',
        ];
    }
  
    public function map($student) : array {
        return [
            $student->name,
            $student->email,
            $student->major->name,
            $student->dob,
            $student->address,
            $student->created_at,
            $student->updated_at,
        ] ;
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->freezePane('A2');
   
            },
        ];
    }
}
