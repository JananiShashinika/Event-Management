<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{

    use HasFactory;

    protected $fillable = [
        'id',
        'event_type',
        'event_type_id',
    ];

    public function annual_events(){
        return $this->hasMany(AnnualEvent::class,'event_type_id', 'id');
    }

}
