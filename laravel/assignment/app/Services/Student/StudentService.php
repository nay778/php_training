<?php

namespace App\Services\Student;

use App\Mail\StudentMail;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentService implements StudentServiceInterface
{
    private $studentDao;

    public function __construct(StudentDaoInterface $studentDaoInterface)
    {
        $this->studentDao = $studentDaoInterface;
    }

    /**
     * To get student list
     * @return array 
     */
    public function studentList()
    {
        return $this->studentDao->studentList();
    }

    /**
     * To add student record
     * @param $request
     */
    public function saveStudent(Request $request)
    {
        $msg =  $this->studentDao->saveStudent($request);

        if($msg){
            Mail::to($request->email)->send(new StudentMail());
            return $msg;
        }
    }

    /**
     * To show student record by id
     * @param $id
     */
    public function edit($id)
    {
        return $this->studentDao->edit($id);
    }

    /**
     * To update student record by id
     * @param $id
     * @param $request
     */
    public function updateStudentById($request, $id)
    {

        $this->studentDao->updateStudentById($request, $id);
    }
    /**
     * To delete student by id
     * @param $id
     */
    public function deleteStudentById($id)
    {
        return $this->studentDao->deleteStudentById($id);
    }

     /**
     * Excel file Import
     */
    public function excelImport()
    {
        return Excel::import(new StudentImport,request()->file('file'));
    }
    /**
     * To get student list for excel export
     * @return array 
     */
    public function studentListExport()
    {
        return $this->studentDao->studentListExport();
    }

    /**
     * Excel file Export
     */
    public function excelExport(){
        
       return Excel::download(new StudentsExport($this->studentDao), 'students.xlsx');
    }

    /**
     * PDF file Export
     */
    public function pdfExport(){
        $students =  $this->studentDao->studentList();
        $data = [
            'lists' => $students,
            'date' => date('m/d/Y')
        ];
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('Api.student.studentListPDF', $data);
    
        return $pdf->download('studentLists.pdf');
     }
 
    /**
     *to find student list
     * @param $request
     */
    public function search($request){
        return $this->studentDao->search($request);
    }
    
    /**
     *to send student list
    * @param $
    */
    public function mail(Request $request)
    {  
        $email = $request->email;
        $object =  $this->studentDao->lastStudentList();;
        $lists = $object->toArray();

        Mail::send('Api.emails.sendListMail', compact('lists'), function($message) use ($email) {
            $message->to($email, 'Student Reocrd')->subject
               ('Student List');
            });
        return 'success';
    }


}
