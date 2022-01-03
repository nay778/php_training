<?php
namespace App\Dao\Student;
use Illuminate\Http\Request;
use App\Models\Student\Major;
use App\Models\Student\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentDao implements StudentDaoInterface
{
    /**
     * To show majors in  create from
     */
    public function majorList()
    {
        $majors = Major::pluck('name', 'id');
        return $majors;
    }

    /**
     * To show student create from
     */
    public function studentList()
    {
        $lists = Student::all();
        return $lists;
    }

    /**
     * To add student record
     * @param $request
     */
    public function saveStudent(Request $request)
    {
        $data = new Student;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->major_id = $request->major_id;
        $data->save();
        return $data;
    }

    /**
     * To show student record by id
     * @param $id
     */
    public function edit($id)
    {
        $data = Student::find($id);
        return $data;
    }

    /**
     * To update student record by id
     * @param $id
     * @param $request
     */
    public function updateStudentById($request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->major_id = $request->input('major_id');
        $student->address = $request->input('address');
        $student->update();
    }

    /**
     * To delete student by id
     * @param $id
     */
    public function deleteStudentById($id){
        Student::findOrFail($id)->delete();
    }
}