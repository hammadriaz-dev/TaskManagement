<?php

namespace Modules\Task\DTO;

use InvalidArgumentException;

readonly class TaskDTO
{
    private function __construct(
        private int $user_id,
        private string $title,
        private ?string $description,
        private string $status = 'pending'
    ) {
    }

    public static function create(
        int $user_id,
        string $title,
        ?string $description = null,
        string $status = 'pending',
    ): self {
        return new self($user_id, $title, $description, $status);
    }

     public function getUserId(): int
    {
        return $this->user_id;
    }
    
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

}