<?php

namespace Modules\Task\Services;

use Modules\Task\Contracts\Repositories\CommentRepositoryInterface;
use Modules\Task\Contracts\Services\CommentServiceInterface;
use Modules\Task\DTO\CommentDTO;
use Modules\Task\Entities\Comment;

class CommentService implements CommentServiceInterface
{
    public function __construct(
        private CommentRepositoryInterface $repo
    ) {}

    /**
     * Summary of create
     * @param CommentDTO $dto
     * @return Comment
     */
    public function create(CommentDTO $dto): Comment
    {
        return $this->repo->create(
            $dto->getTaskId(),
            $dto->getUserId(),
            $dto->getComment()
        );
    }
}
