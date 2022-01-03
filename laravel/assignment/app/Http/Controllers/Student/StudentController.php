<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\Student\Major;
use App\Models\Student\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentController extends Controller
{   
    public $studentInterface;
    public function __construct(StudentServiceInterface $studentServiceInterfae)
    {
        $this->studentInterface = $studentServiceInterfae;
    }

    public function index()
    {
        $lists =  $this->studentInterface->studentList();
        return view('student.list',compact('lists'));
    }

    /**
     * To show student create from
     * @return View create_from
     */
    public function createForm()
    {   
        $majors = $this->studentInterface->majorList();
        return view('student.create_form',compact('majors'));
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
            'email' => 'required',
            'address' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')
                ->withInput()
                ->withErrors($validator);
        }
        $user = $this->studentInterface->saveStudent($request);
        return redirect()->route('list');
    }

    /**
     * To show student record by id
     * @param $id
     * @return View edit_form
     */
    public function editForm($id)
    {   
        $student = $this->studentInterface->edit($id);
        $majors = $this->studentInterface->majorList();
        return view('student.edit_form')->with(compact('student','majors'));
    }
    /**
     * To update student record by id
     * @param $id
     * @param $request
     * @return View list
     */
    public function update(Request $request,$id)
    {
        $this->studentInterface->updateStudentById($request,$id);
        return redirect()->route('list');
    }

    /**
     * To delete student by id
     * @param $id
     * @return View list
     */
    public function delete($id)
    {
        $this->studentInterface->deleteStudentById($id);
        return redirect()->route('list');
    }
}
