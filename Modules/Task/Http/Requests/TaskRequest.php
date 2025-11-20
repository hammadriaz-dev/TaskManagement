<?php

namespace Modules\Task\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Task\DTO\TaskDTO;

class TaskRequest extends FormRequest
{

    /**
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'user_id' => ['required', 'exists:users,id'],
            'status' => ['sometimes', 'in:pending,process,QA,completed'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The task title is required.',
            'title.string' => 'The task title must be a string.',
            'title.max' => 'The task title may not be greater than 255 characters.',
            'description.string' => 'The description must be a string.',
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user does not exist.',
            'status.in' => 'The status must be one of: pending, process, QA, completed.',
        ];
    }

    public function getDTO(){
       return TaskDTO::create(
            user_id: $this->input('user_id'),
            title: $this->input('title'),
            description: $this->input('description'),
            status: $this->input('status', 'pending')
        );
    }
}