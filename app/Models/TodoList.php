<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TodoList extends Model
{
    const ON_STATUS = 1;
    const OF_STATUS = 2;

    const STATUS = [
        self::ON_STATUS,
        self::OF_STATUS,
    ];

    use HasFactory;

    protected $guarded = [];

    protected $casts = [];

}
