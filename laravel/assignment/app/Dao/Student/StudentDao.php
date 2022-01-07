<?php
namespace App\Dao\Student;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Student\StudentDaoInterface;

class StudentDao implements StudentDaoInterface
{   
    
    /**
     * To show student create from
     * @return object
     */
    public function studentList()
    {
        $lists = Student::orderBy('created_at', 'desc')->get();
        return $lists;
    }

    /**
     * To add student record
     * @param $request 
     * @return Object $data
     */
    public function saveStudent(Request $request)
    {
        $data = new Student;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->dob = $request->dob;
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
    public function deleteStudentById($id)
    {
        Student::findOrFail($id)->delete();
    }

    /**
     * To get student list for excel export
     */
    public function studentListExport()
    {
        $lists = Student::with('major')->get();
        return $lists;
    }

    /**
     *to find student list
     * @param $request
     * @return Array
     */
    public function search($request){
        $students = DB::table('students')
        ->join('majors', 'students.major_id', 'majors.id')
        ->select('students.*', 'majors.name as major_name');

        $name = $request->name;
        $startDate = $request->start;
        $endDate = $request->end;
        
        if($name){
            $students->where('students.name', 'like', '%'. $name .'%');
        }
        if($startDate){
            $students->whereDate('students.created_at', '>=', $startDate);
        }
        if($endDate){
            $students->whereDate('students.created_at', '<=', $endDate);
        }

        return $students->get();

    }
}