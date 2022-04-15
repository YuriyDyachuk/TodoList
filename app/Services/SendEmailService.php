<?php

declare(strict_types=1);

namespace App\Services;

use App\Mail\NewTaskMail;
use App\Models\TodoList;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{
    public function sendEmail(TodoList $list): void
    {
        Mail::to(getenv('MAIL_TO'))->send(new NewTaskMail($list->name));
    }
}