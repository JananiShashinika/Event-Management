<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    protected $table = 'sub_tasks';

    protected $fillable = [
        'new_event_id',
        'event_id',
        'tasks',
        'emp_assign',
        'status'

    ];
}
