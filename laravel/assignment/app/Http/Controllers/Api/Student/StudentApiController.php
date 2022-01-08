<?php

namespace App\Http\Controllers\Api\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @return View list
     */
    public function index()
    {
        $lists =  $this->studentInterface->studentList();
        return response()->json($lists);
        
    }

    /**
     * To show student create from
     * @return View create_from
     */
    public function createForm()
    {   
        $majors = $this->majorInterface->majorList();
        return response()->json($majors);
    }

    /**
     * To add student record
     * @param $request
     * @return View list
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
        return response(['message' => $msg]);
    }

    /**
     * To show student record by id
     * @param $id
     * @return View edit_form
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
     * @return View list
     */
    public function update(Request $request,$id)
    {
        $msg = $this->studentInterface->updateStudentById($request,$id);
        return response(['message' => $msg]);
    }

    /**
     * To delete student by id
     * @param $id
     * @return View list
     */
    public function delete($id)
    {
        $msg = $this->studentInterface->deleteStudentById($id);
        return response(['message' => $msg]);;
    }
    /**
    * Excel file Import
    */
    public function importExportView() 
    {
        return view('student.import');
     }
    /**
    * Excel file Import
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
        return view('student.search', compact('lists'));
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
        return response()->json($lists);      
    }


}
