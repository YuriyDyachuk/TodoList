<?php

declare(strict_types=1);

namespace App\DataTransferObject;

class RegisterDTO
{
    public string $name;
    public string $email;
    public string $password;
    public int    $groupId;

    public function __construct(
        string $name,
        string $email,
        string $password,
        int    $groupId
    ){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->groupId = $groupId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }
}