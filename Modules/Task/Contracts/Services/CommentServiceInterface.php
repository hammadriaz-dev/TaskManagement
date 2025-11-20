<?php

namespace Modules\Task\Contracts\Services;

use Modules\Task\DTO\CommentDTO;
use Modules\Task\Entities\Comment;

interface CommentServiceInterface
{
    /**
     * Summary of create
     * @param CommentDTO $dto
     * @return Comment
     */
    public function create(CommentDTO $dto): Comment;
}
