<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\AuthRepository;
use App\DataTransferObject\RegisterDTO;

class AuthService
{
    private AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function create(RegisterDTO $DTO): void
    {
        $this->authRepository->create($DTO);
    }
}