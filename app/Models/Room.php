<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    //Relationships with other models

    //relationship one to many with Reservation
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    //relationship many to many with User
    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations');
    }
}
