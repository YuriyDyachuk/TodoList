<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\TodoList;
use App\DataTransferObject\TodoDTO;

class TodoRepository
{
    public function all()
    {
        return TodoList::query()->get();
    }

    public function create(TodoDTO $DTO): void
    {
        TodoList::query()->create([
            'name' => $DTO->getName(),
            'status' => $DTO->getStatus()
        ])->refresh();
    }

    public function delete(int $id): void
    {
        TodoList::query()->where(['id' => $id])->delete();
    }

    ############################## [CUSTOM METHOD] ##############################

    public function changeStatus(int $id): void
    {
        TodoList::query()->where(['id' => $id])->update(['status' => TodoList::OF_STATUS]);
    }

    public function findById(int $id): ?TodoList
    {
        return TodoList::query()->where(['id' => $id])->firstOrFail();
    }
}