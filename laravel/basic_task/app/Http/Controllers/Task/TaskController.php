<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{
    private $taskInterface;
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show task list
     *
     * @return View task list
     */
    public function index()
    {
        $tasks = $this->taskInterface->getTaskList();
        return view('tasks.tasks', compact('tasks'));
    }
    /**
     * To submit task create confirm view
     * @param Request $request
     * @return View task list
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('tasks')
                ->withInput()
                ->withErrors($validator);
        }
        $task = $this->taskInterface->saveTask($request);
        return redirect('tasks');
    }

    /**
     * To delete task by id
     * @param $id
     * @return View task list
     */
    public function delete($id)
    {
        $this->taskInterface->deleteTaskById($id);
        return redirect('tasks');
    }
}
