<?php

declare(strict_types=1);

namespace App\Factories;

use App\Models\TodoList;
use App\Http\Requests\TodoRequest;
use App\DataTransferObject\TodoDTO;

class TodoFactory
{
    public function create(TodoRequest $request): TodoDTO
    {
        return new TodoDTO(
            $request->input('name'),
            TodoList::ON_STATUS
        );
    }
}