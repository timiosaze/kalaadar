<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'question',
        'answer',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
