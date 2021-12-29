<?php
namespace App\Contracts\Dao;
use Illuminate\Http\Request;

interface TaskDaoInterface
{
  public function getTaskList();

  public function saveTask(Request $request);

  public function deleteTaskById($id);
}