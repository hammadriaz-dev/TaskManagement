<?php 

namespace Modules\Task\Services;

use Modules\Task\Contracts\Services\TaskServiceInterface;
use Modules\Task\Contracts\Repositories\TaskRepositoryInterface;
use Modules\Task\Entities\Task;
use Modules\Task\DTO\TaskDTO;

class TaskService implements TaskServiceInterface{

    public function __construct(private TaskRepositoryInterface $repo){}

    public function all(){
        return $this->repo->all();
    }

    public function find($id){
        return $this->repo->find($id);
    }

    public function create(TaskDTO $dto){
        return $this->repo->create(
            $dto->getUserId(),
            $dto->getTitle(),
            $dto->getDescription(),
            $dto->getStatus()
        );
    }

    public function update(Task $task, TaskDTO $dto){
        return $this->repo->update(
             $task,
            $dto->getUserId(),
            $dto->getTitle(),
            $dto->getDescription(),
            $dto->getStatus()
        );
    }

    public function delete(Task $task){
        return $this->repo->delete($task);
    }

    /**
     * Summary of allForUser
     * @param int $userId
     */
    public function allForUser(int $userId)
    {
        return $this->repo->allForUser($userId);
    }

    public function updateStatus(Task $task, string $status): Task
    {
        return $this->repo->update($task, null, null, null, $status);
    }
}