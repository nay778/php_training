<?php
namespace App\Dao;
use App\Models\Task;
use App\Contracts\Dao\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskDao implements TaskDaoInterface
{
  public function getTaskList()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  public function saveTask(Request $request)
  {
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return $task;
    }

  public function deleteTaskById($id)
  {
    Task::findOrFail($id)->delete();
    //return "delete successful";
  }
}