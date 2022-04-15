<?php

declare(strict_types=1);

namespace App\Repositories;

use App\DataTransferObject\RegisterDTO;
use App\Models\User;

class AuthRepository
{
    public function create(RegisterDTO $DTO): void
    {
        User::query()->create([
            'name' => $DTO->getName(),
            'email' => $DTO->getEmail(),
            'password' => $DTO->getPassword(),
            'group_id' => $DTO->getGroupId(),
        ])->refresh();
    }
}