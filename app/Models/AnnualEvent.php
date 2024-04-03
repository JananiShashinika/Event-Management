<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'event_name',
        'description',
        'start_date',
        'end_date',
        'event_type_id',
        'coordinator_id',
        'sp_note_id',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

}
