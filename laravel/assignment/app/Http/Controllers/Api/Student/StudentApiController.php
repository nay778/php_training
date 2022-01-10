<?php

namespace App\Http\Controllers\Api\Student;

use App\Mail\StudentMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Major\MajorServiceInterface;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentApiController extends Controller
{   
    public $studentInterface, $majorInterface;
    public function __construct(StudentServiceInterface $studentServiceInterfae,MajorServiceInterface $majorServiceInterfae,)
    {
        $this->studentInterface = $studentServiceInterfae;
        $this->majorInterface = $majorServiceInterfae;
    }

    /**
     * To show student list
     * @return object
     */
    public function index()
    {
        $lists =  $this->studentInterface->studentList();
        return response()->json($lists); 
    }

    /**
     * To show student create from
     * @return object 
     */
    public function createForm()
    {   
        $majors = $this->majorInterface->majorList();
        return response()->json($majors);
    }

    /**
     * To add student record
     * @param $request
     * @return object
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')
                ->withInput()
                ->withErrors($validator);
        }
        $msg = $this->studentInterface->saveStudent($request);
        if($msg){
            Mail::to($request->email)->send(new StudentMail());
        }
        return response(['message' => $msg]);
    }

    /**
     * To show student record by id
     * @param $id
     * @return object
     */
    public function editForm($id)
    {   
        $student = $this->studentInterface->edit($id);
        $majors = $this->majorInterface->majorList();
        $result = [
            'student' => $student,
            'majors' => $majors,
        ];
        return response()->json($result);
    }
    
    /**
     * To update student record by id
     * @param $id
     * @param $request
     * @return object
     */
    public function update(Request $request,$id)
    {
        $msg = $this->studentInterface->updateStudentById($request,$id);
        return response(['message' => $msg]);
    }

    /**
     * To delete student by id
     * @param $id
     * @return object
     */
    public function delete($id)
    {   
        $msg = $this->studentInterface->deleteStudentById($id);
        return response(['message' => $msg]);
    }
   
    /**
    * Excel file Import
    *@return View
    */
    public function import(Request $request) 
    { 
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $file = $this->studentInterface->excelImport();
        return redirect()->route('list');
    }

    /**
     * Excel file Export
     */
    public function export()
    {   
        return $this->studentInterface->excelExport();
    }


    /**
     * search
     * @return view 
     */
    public function searchView()
    {   
        $lists = [];
        return view('Api.student.search', compact('lists'));
    }


    /**
     *to find student list
    * @param $request
     *@return view 
    */
    public function search(Request $request)
    {       
       
        if($request->name == '' && $request->start == '' && $request->end == ''){
            $lists = [];
        }else{
            $lists = $this->studentInterface->search($request);
        }
        return view('Api.student.search', compact('lists'));     
    }
    
    /**
     *to send student list
    * @param $request
    */
    public function mail(Request $request)
    {  
        $email = $request->email;
        $object =  $this->studentInterface->lastStudentList();
        $lists = $object->toArray();
        Mail::send('Api.emails.sendListMail', compact('lists'), function($message) use ($email) {
            $message->to($email, 'Student Reocrd')->subject
               ('Student List');
            });
        $data = 'success';
        return view('Api.student.mail',compact('data'));
    }
}
