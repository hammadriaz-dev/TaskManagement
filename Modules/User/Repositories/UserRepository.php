<?php

namespace Modules\User\Repositories;

use Modules\User\Contracts\Repositories\UserRepositoryInterface;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $model)
    {
    }

    public function all()
    {
        return $this->model->newQuery()
            ->with('roles')
            ->where('created_by', Auth::id())
            ->get();
    }

    public function find($id)
    {
        return $this->model->newQuery()
            ->with('roles')
            ->where('created_by', Auth::id())
            ->findOrFail($id);
    }

    /**
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
    ): User {
        $objQuery = $this->model->newQuery();

        $user = $objQuery->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'created_by' => Auth::id(),
        ]);

        if (!empty($roles)) {
            $roles = is_array($roles) ? $roles : [$roles];
            $user->syncRoles($roles);
        }

        return $user->fresh();
    }

    /**
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
    ): User {
        $data = [];

        // Check Name
        if (!is_null($name) && $user->name !== $name) {
            $data['name'] = $name;
        }

        // Check Email
        if (!is_null($email) && $user->email !== $email) {
            $data['email'] = $email;
        }

        // Check Password
        if (!is_null($password)) {
            $data['password'] = $password;
        }

        // Only hit DB if basic data actually changed
        if (!empty($data)) {
            $user->update($data);
        }

        // Check Roles
        if (!is_null($roles)) {
            $roles = is_array($roles) ? $roles : [$roles];
            $user->syncRoles($roles);
        }

        return $user->fresh();
    }

    public function delete(User $user): ?bool
    {
        if ($user->created_by !== Auth::id()) {
            return false; 
        }
        return $user->delete();
    }
}
