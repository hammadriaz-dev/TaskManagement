<?php

namespace Modules\Task\Repository;

use Modules\Task\Contracts\Repositories\CommentRepositoryInterface;
use Modules\Task\Entities\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function __construct(private Comment $model)
    {
    }


    /**
     * Summary of create
     * @param int $task_id
     * @param int $user_id
     * @param string $comment
     * @return Comment
     */
    public function create(
        int $task_id,
        int $user_id,
        string $comment
    ): Comment {
        return $this->model->newQuery()->create([
            'task_id' => $task_id,
            'user_id' => $user_id,
            'comment' => $comment,
        ]);
    }
}

