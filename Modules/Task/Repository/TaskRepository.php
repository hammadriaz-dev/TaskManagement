<?php

namespace Modules\Task\Repository;

use Illuminate\Database\Eloquent\Collection;
use Modules\Task\Entities\Task;
use Modules\Task\Contracts\Repositories\TaskRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Modules\User\Entities\User;

class TaskRepository implements TaskRepositoryInterface
{

    public function __construct(private Task $model)
    {
    }

    /**
     * Summary of all
     * @return Collection<int, Task>
     */
    public function all(): Collection
    {
        $createdUserIds = User::where('created_by', Auth::id())->pluck('id');
        return $this->model->newQuery()
            ->with('user')
            ->whereIn('user_id', $createdUserIds)
            ->get();
    }

    /**
     * Summary of find
     * @param int $id
     * @return Collection<int, Task>|Task|null
     */
    public function find(int $id): ?Task
    {
        $createdUserIds = User::where('created_by', Auth::id())->pluck('id');

        return $this->model->newQuery()
            ->with('user')
            ->where('id', $id)
            ->whereIn('user_id', $createdUserIds)
            ->firstOrFail();
    }

    /**
     * Summary of create
     * @param int $user_id
     * @param string $title
     * @param ?string $description
     * @param string $status
     * @return Task
     */
    public function create(int $user_id, string $title, ?string $description, string $status = 'pending'): Task
    {
        $task = $this->model->create([
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'status' => $status,
        ]);

        return $task->fresh();
    }


    /**
     * Summary of update
     * @param Task $task,
     * @param ?int $user_id
     * @param ?string $title
     * @param ?string $description
     * @param ?string $status
     * @return Task
     */
    public function update(Task $task, ?int $user_id, ?string $title, ?string $description, ?string $status): Task
    {
        $data = [];

        if (!is_null($user_id))
            $data['user_id'] = $user_id;
        if (!is_null($title))
            $data['title'] = $title;
        if (!is_null($description))
            $data['description'] = $description;
        if (!is_null($status))
            $data['status'] = $status;

        if (!empty($data)) {
            $task->update($data);
        }

        return $task->fresh();
    }

    /**
     * Summary of delete
     * @param Task $task
     * @return bool|null
     */
    public function delete(Task $task): ?bool
    {
        return $task->delete();
    }

    public function allForUser(int $userId)
    {
       return $this->model->newQuery()
            ->where('user_id', $userId)
            ->with('comments.user')
            ->latest()
            ->get();
    }

    public function updateStatus(Task $task, string $status): bool
    {
        return $task->update(['status' => $status]);
    }
}
