<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Task\DTO\CommentDTO;

class CommentRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'comment' => 'required|string|min:2',
        ];
    }

    public function getDTO()
    {
        return CommentDTO::create(
            task_id: $this->route('task')->id,
            user_id: auth()->id(),
            comment: $this->comment,
        );
    }
}
