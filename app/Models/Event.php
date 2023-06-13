<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_name',
        'eventlinks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function date()
    {
        return $this->hasOne(Date::class);
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function bookingevent()
    {
        return $this->hasOne(BookingEvent::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    
    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
    public function bookingdetail()
    {
        return $this->hasOne(BookingDetail::class);
    }
}
