<?php

declare(strict_types=1);

namespace App\DataTransferObject;

class TodoDTO
{
    public string $name;
    public int $status;

    public function __construct(
        string $name,
        int $status
    ){
        $this->name = $name;
        $this->status = $status;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): int
    {
        return $this->status;
    }
}