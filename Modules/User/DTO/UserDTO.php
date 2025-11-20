<?php

namespace Modules\User\DTO;
use Illuminate\Support\Facades\Hash;
readonly class UserDTO
{
    private function __construct(
        private string $name,
        private string $email,
        private ?string $password,
        private array $roles = ['user']
    ) {
    }

    public static function create(
        string $name,
        string $email,
        ?string $password,
        array $roles = ['user']
    ): self {
        $hashedPassword = $password ? Hash::make($password) : null;
        return new self($name, $email, $hashedPassword, $roles);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
