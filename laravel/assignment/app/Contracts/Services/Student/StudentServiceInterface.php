<?php
namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

interface StudentServiceInterface
{
     /**
     * To show student create from
     * @return object View create_from
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

    /**
     * Excel file Import
     */
    public function excelImport();

     /**
     * Excel file Export
     */
    public function excelExport();

    /**
     *To get student list for excel export
     */
    public function studentListExport();

    /**
     *to find student list
     * @param $request
     */
    public function search($request);

    /**
     * To send student list
     * @return object
     */
    public function lastStudentList();
    
}