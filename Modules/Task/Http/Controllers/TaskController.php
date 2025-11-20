<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Task\Contracts\Services\TaskServiceInterface;
use Modules\Task\Http\Requests\TaskRequest;
use Modules\Task\Entities\Task;
use Modules\User\Entities\User;

class TaskController extends Controller
{
    public function __construct(private TaskServiceInterface $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->service->all();
        return view('task::admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('created_by', Auth::id())->get();
                     
        return view('task::admin.tasks.create', compact('users')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $dto = $request->getDTO();
        $this->service->create($dto);
        return redirect()->route('admin.tasks.index')->with('success', 'Task Created');
    }

    /**
     * Show the specified resource.
     */
    public function show(Task $task)
    {
        $task = $this->service->find($task->id); 
        $task->load('user');
        return view('task::admin.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $users = User::where('created_by', Auth::id())->get();
        $task = $this->service->find($id);
        
        return view('task::admin.tasks.edit', compact('task', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $dto = $request->getDTO();
        $this->service->update($task, $dto);
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->service->delete($task);
        return redirect()->back()->with('success', 'Task deleted');
    }
}
