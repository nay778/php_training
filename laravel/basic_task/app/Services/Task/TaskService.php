<?php
namespace App\Services\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface
{
  private $taskDao;

  public function __construct(TaskDaoInterface $taskDaoInterface)
  {
    $this->taskDao = $taskDaoInterface;
  }
  /**
   * To get task list
   * @return array $tasks
   */
  public function getTaskList()
  {
    return $this->taskDao->getTaskList();
  }

  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $task
   */
  public function saveTask(Request $requset)
  {
    return $this->taskDao->saveTask($requset);
  }
  /**
   * To delete task by id
   * @param $id
   */
  public function deleteTaskById($id)   
  {
    return $this->taskDao->deleteTaskById($id);
  }
}