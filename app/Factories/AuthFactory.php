<?php

declare(strict_types=1);

namespace App\Factories;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\DataTransferObject\RegisterDTO;

class AuthFactory
{
    public function create(RegisterRequest $request): RegisterDTO
    {
        return new RegisterDTO(
            $request->input('name'),
            $request->input('email'),
            bcrypt($request->input('password')),
            User::DEFAULT_GROUP
        );
    }
}