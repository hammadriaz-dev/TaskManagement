<?php

namespace Modules\Task\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Task\Contracts\Services\TaskServiceInterface;
use Modules\Task\Contracts\Services\CommentServiceInterface;
use Modules\Task\Entities\Task;
use Illuminate\Support\Facades\Auth;
use Modules\Task\Http\Requests\CommentRequest;

class UserTaskController extends Controller
{
    public function __construct(
        private TaskServiceInterface $taskService,
        private CommentServiceInterface $commentService
    ) {
    }

    /**
     * Display all tasks for the authenticated user
     */
    public function index()
    {
        $tasks = $this->taskService->allForUser(Auth::id());
        return view('task::user.index', compact('tasks'));
    }

    /**
     * Show a single task with comments
     */
    public function show(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }

        $task->load('comments.user');

        return view('task::user.show', compact('task'));
    }


    // Status update form page
    public function editStatus(Task $task)
    {
        return view('task::user.status', compact('task'));
    }

    /**
     * Update only the status of a task for the user
     */
    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:pending,process,QA,completed'
        ]);

        if ($task->user_id !== Auth::id())
            abort(403);

        $this->taskService->updateStatus($task, $request->status);

        return redirect()->route('user.tasks.index')->with('success', 'Status updated successfully!');
    }


    // Comment form page
    public function createComment(Task $task)
    {
        return view('task::user.comment', compact('task'));
    }
    /**
     * Add a comment to a task
     */
    public function comment(CommentRequest $request, Task $task)
    {
        $dto = $request->getDTO();
        $this->commentService->create($dto);

        return redirect()->route('user.tasks.index')->with('success', 'Comment added');
    }
}
