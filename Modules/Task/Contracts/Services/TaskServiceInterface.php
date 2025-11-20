<?php

namespace Modules\Task\Contracts\Services;

use Modules\Task\DTO\TaskDTO;
use Modules\Task\Entities\Task;

interface TaskServiceInterface
{
    public function all();

    public function find($id);

    public function create(TaskDTO $dto);

    public function update(Task $task, TaskDTO $dto);

    public function delete(Task $task);

    public function allForUser(int $userId);
    public function updateStatus(Task $task, string $status): Task;

}