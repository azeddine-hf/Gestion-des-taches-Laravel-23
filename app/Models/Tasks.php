<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'desc_task',
        'date_start',
        'date_end',
        'status',
        'property',
    ];
}
