<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\User\DTO\UserDTO;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $userId = $this->route('user')?->id;

        
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => $this->isMethod('post')
            ? 'required|string|min:8|confirmed'
            : 'nullable|string|min:8|confirmed',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }

    /**
     * Convert request data to a UserDTO.
     *
     * @return UserDTO
     */
    public function getDTO(): UserDTO
    {
        return UserDTO::create(
            name: $this->input('name'),
            email: $this->input('email'),
            password: $this->input('password'),
            roles: $this->input('roles', ['user'])
        );
    }

}