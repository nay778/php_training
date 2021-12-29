<?php
namespace App\Services;
use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface
{
  private $taskDao;

  public function __construct(TaskDaoInterface $taskDaoInterface)
  {
    $this->taskDao = $taskDaoInterface;
  }

  public function getTaskList()
  {
    return $this->taskDao->getTaskList();
  }

  public function saveTask(Request $requset)
  {
    return $this->taskDao->saveTask($requset);
  }

  public function deleteTaskById($id)   
  {
    return $this->taskDao->deleteTaskById($id);
  }
}