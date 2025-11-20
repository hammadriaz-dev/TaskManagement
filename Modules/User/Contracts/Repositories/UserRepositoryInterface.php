<?php

namespace Modules\User\Contracts\Repositories;

use Illuminate\Support\Collection;
use Modules\User\Entities\User;
use Modules\User\DTO\UserDTO;

interface UserRepositoryInterface
{

    public function all();

    /**
     * Find a user by ID
     *
     * @param int $id
     * 
     */
    public function find($id);

    /**
     * Create a new user
     *
     * @param string $name
     * @param string $email
     * @param string|null $password
     * @param array $roles
     * @return User
     */
    public function create(
        string $name,
        string $email,
        ?string $password,
        array $roles = ['user']
    ): User;

    /**
     * Update an existing user
     *
     * @param User $user
     * @param string|null $name
     * @param string|null $email
     * @param string|null $password
     * @param array|null $roles
     * @return User
     */
    public function update(
        User $user,
        ?string $name = null,
        ?string $email = null,
        ?string $password = null,
        ?array $roles = null
    ): User;

    /**
     * Delete a user
     *
     * @param User $user
     * @return bool|null
     */
    public function delete(User $user): ?bool;
}
