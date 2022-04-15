<?php

declare(strict_types=1);

namespace App\Services;

use App\DataTransferObject\TodoDTO;
use App\Repositories\TodoRepository;

class TodoService
{
    private TodoRepository $todoRepository;
    private SendEmailService $sendEmailService;

    public function __construct(
        TodoRepository $todoRepository,
        SendEmailService $sendEmailService
    ){
        $this->todoRepository = $todoRepository;
        $this->sendEmailService = $sendEmailService;
    }

    public function all()
    {
        return $this->todoRepository->all();
    }

    public function create(TodoDTO $DTO)
    {
        $this->todoRepository->create($DTO);
    }

    public function destroy(int $id): void
    {
        $this->todoRepository->delete($id);
    }

    ############################## [CUSTOM METHOD] ##############################

    public function changeStatus(int $id): void
    {
        $task = $this->todoRepository->findById($id);

        if (isset($task)) {
            $this->todoRepository->changeStatus($id);
//            $this->sendEmailService->sendEmail($task);
        }
    }
}