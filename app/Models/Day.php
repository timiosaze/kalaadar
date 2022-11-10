<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'name',
        'end_time',
        'start_time'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    
}
