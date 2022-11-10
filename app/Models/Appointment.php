<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_link',
        'app_description',
        'timezone',
        'duration',
        'book_multiple_times',
        'required_detail',
        'payment_amount',
        'payment_mode'
    ];


    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
