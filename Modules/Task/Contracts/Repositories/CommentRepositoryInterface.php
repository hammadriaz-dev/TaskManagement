<?php

namespace Modules\Task\Contracts\Repositories;

use Modules\Task\Entities\Comment;

interface CommentRepositoryInterface
{
    /**
     * Summary of create
     * @param int $task_id
     * @param int $user_id
     * @param string $comment
     * @return Comment
     */
    public function create(int $task_id, int $user_id, string $comment): Comment;
}
