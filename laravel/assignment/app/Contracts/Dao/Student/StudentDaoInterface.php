<?php
namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

interface StudentDaoInterface
{   
    /**
     * To show majors in  create from
     */
    public function majorList();

     /**
     * To show student create from
     */
    public function studentList();

    /**
     * To add student record
     * @param $request
     */
    public function saveStudent(Request $request);

    /**
     * To show student record by id
     * @param $id
     */
    public function edit($id);

    /**
     * To update student record by id
     * @param $id
     * @param $request
     */
    public function updateStudentById($request, $id);

    /**
     * To delete student by id
     * @param $id
     */
    public function deleteStudentById($id);
}