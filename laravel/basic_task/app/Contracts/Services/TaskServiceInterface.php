<?php
namespace App\Contracts\Services;
use Illuminate\Http\Request;

interface TaskServiceInterface
{
  public function getTaskList();
  public function saveTask(Request $request);
  public function deleteTaskById($id);
}