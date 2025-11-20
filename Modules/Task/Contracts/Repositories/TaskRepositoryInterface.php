<?php

namespace Modules\Task\Contracts\Repositories;

use Illuminate\Support\Collection;
use Modules\Task\Entities\Task;

interface TaskRepositoryInterface
{
    /**
     * Get all tasks
     *
     * @return Collection
     */
    public function all(): Collection;

    /**
     * Find a task by ID
     *
     * @param int $id
     * @return Task|null
     */
    public function find(int $id): ?Task;

    /**
     * Create a new task
     *
     * @param int $user_id
     * @param string $title
     * @param string|null $description
     * @param string $status
     * @return Task
     */
    public function create(
        int $user_id,
        string $title,
        ?string $description,
        string $status = 'pending'
    ): Task;

    /**
     * Update an existing task
     *
     * @param Task $task
     * @param int|null $user_id
     * @param string|null $title
     * @param string|null $description
     * @param string|null $status
     * @return Task
     */
    public function update(
        Task $task,
        ?int $user_id,
        ?string $title,
        ?string $description,
        ?string $status ): Task;

    /**
     * Delete a task
     *
     * @param Task $task
     * @return bool|null
     */
    public function delete(Task $task): ?bool;


    public function allForUser(int $userId);

    public function updateStatus(Task $task, string $status): bool;
}
