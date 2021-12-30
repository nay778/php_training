<?php
namespace App\Contracts\Dao\Task;
use Illuminate\Http\Request;

interface TaskDaoInterface
{
  /**
   * To get task list
   * @return array $tasks
   */
  public function getTaskList();

  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveTask(Request $request);
  
  /**
   * To delete task by id
   * @param $id
   */
  public function deleteTaskById($id);
}