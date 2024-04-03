<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEvent extends Model
{
    use HasFactory;

    protected $table = 'new_event';

    public $timestamps = false;

    protected $fillable = [
        'event_name',
        'start_date',
        'end_date',
        'coordinator',
        'event_id', 
    ];


// Assuming the relationship between NewEvent and Task is a many-to-many relationship
// You may need to adjust the relationship based on your database structure
public function tasks()
{
    return $this->belongsToMany(Task::class);
}

}
