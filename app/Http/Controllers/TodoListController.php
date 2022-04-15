<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TodoService;
use App\Factories\TodoFactory;
use App\Http\Requests\TodoRequest;

class TodoListController extends Controller
{
    private TodoFactory $todoFactory;
    private TodoService $todoService;

    public function __construct(
        TodoFactory $todoFactory,
        TodoService $todoService
    ){
        $this->todoFactory = $todoFactory;
        $this->todoService = $todoService;
    }

    public function index()
    {
        $lists = $this->todoService->all();

        return view("todo.main", ['lists' => $lists]);
    }

    public function create()
    {
        return view("todo.create");
    }

    public function store(TodoRequest $request)
    {
        $DTO = $this->todoFactory->create($request);
        $this->todoService->create($DTO);

        return redirect("todo")->withSuccess('Successfully creating');
    }

    public function destroy(int $id)
    {
        $this->todoService->destroy($id);

        return redirect("todo")->withSuccess('Successfully deleting');
    }

    ############################## [CUSTOM METHOD] ##############################

    public function changeStatus(int $id)
    {
        $this->todoService->changeStatus($id);

        return redirect("todo")->withSuccess('Successfully change status');
    }
}
