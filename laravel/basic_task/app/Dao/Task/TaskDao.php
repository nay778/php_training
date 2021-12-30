<?php
namespace App\Dao\Task;
use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;

class TaskDao implements TaskDaoInterface
{
  /**
   * To get task list
   * @return array $tasks
   */
  public function getTaskList()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveTask(Request $request)
  {
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return $task;
  }
  
  /**
   * To delete task by id
   * @param $id
   */
  public function deleteTaskById($id)
  {
    Task::findOrFail($id)->delete();
  }
}