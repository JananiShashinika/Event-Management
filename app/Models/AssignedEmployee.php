<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedEmployee extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "assigned_emp";
    protected $fillable = ['event_id','emp_id', 'assigned_em_id'];
}
