<?php

namespace Modules\Task\DTO;

readonly class CommentDTO
{
    private function __construct(
        private int $task_id,
        private int $user_id,
        private string $comment,
    ) {
    }

    public static function create(
        int $task_id,
        int $user_id,
        string $comment,
    ): self {
        return new self($task_id, $user_id, $comment);
    }

    public function getTaskId(): int
    {
        return $this->task_id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function getComment(): string
    {
        return $this->comment;
    }
}
