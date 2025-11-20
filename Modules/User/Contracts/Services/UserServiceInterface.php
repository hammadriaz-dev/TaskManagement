<?php

namespace Modules\User\Contracts\Services;
use Modules\User\Entities\User;
use Modules\User\DTO\UserDTO;


interface UserServiceInterface{
    public function all();
    public function find($id);
    public function create(UserDTO $dto);
     public function update(User $user, UserDTO $dto): User;
    public function delete(User $user);
}