<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class UserDTO
{
    public function __construct(
        public readonly int $role_id,
        public readonly int $company_id,
        public readonly string $name,
        public readonly string $phone,
        public readonly ?int $salary = null,
        public readonly ?string $password = null,
        public readonly ?UploadedFile $avatar = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            role_id: (int) $data['role_id'],
            company_id: (int) $data['company_id'],
            name: (string) $data['name'],
            phone: (string) $data['phone'],
            salary: isset($data['salary']) ? (int) $data['salary'] : null,
            password: isset($data['password']) ? (string) $data['password'] : null,
            avatar: $data['avatar'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'role_id' => $this->role_id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'salary' => $this->salary,
            'password' => $this->password,
            'avatar' => $this->avatar,
        ];
    }
}
