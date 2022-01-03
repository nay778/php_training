<?php

namespace App\Services\Student;

use Illuminate\Http\Request;
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
    * To show majors in  create from
    */
    public function majorList()
    {
        return $this->studentDao->majorList();
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
        return $this->studentDao->saveStudent($request);
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
}
