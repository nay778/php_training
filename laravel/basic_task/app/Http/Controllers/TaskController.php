<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{   
    private $taskInterface;
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    public function index()
    {
        $tasks = $this->taskInterface->getTaskList();
        return view('tasks',compact('tasks'));
    }
    public function add(Request $request)
    {
        $task = $this->taskInterface->saveTask($request);
        return redirect('/');
    }
    public function delete($id)
    {
        $this->taskInterface->deleteTaskById($id);
        return redirect('/');
    }
}
