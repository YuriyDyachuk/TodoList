<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTaskMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $listName;

    public function __construct(string $listName)
    {
        $this->listName = $listName;
    }

    public function build(): self
    {
        return $this->view('email')->with(['name' => $this->listName]);
    }
}
