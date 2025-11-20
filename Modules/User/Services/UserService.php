<?php

namespace Modules\User\Services;

use Modules\User\Contracts\Repositories\UserRepositoryInterface;
use Modules\User\Contracts\Services\UserServiceInterface;
use Modules\User\DTO\UserDTO;
use Modules\User\Entities\User;

class UserService implements UserServiceInterface
{
    protected UserRepositoryInterface $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function all()
    {
        return $this->repo->all();
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
     * Create a new user using a DTO
     */
    public function create(UserDTO $dto): User
    {
        return $this->repo->create(
            $dto->getName(),
            $dto->getEmail(),
            $dto->getPassword(),
            $dto->getRoles()
        );
    }

    /**
     * Update an existing user using a DTO
     */
    public function update(User $user, UserDTO $dto): User
    {
        return $this->repo->update(
            $user,
            $dto->getName(),
            $dto->getEmail(),
            $dto->getPassword(),
            $dto->getRoles()
        );
    }

    public function delete(User $user): ?bool
    {
        return $this->repo->delete($user);
    }
}
