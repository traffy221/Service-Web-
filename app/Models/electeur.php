<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class electeur extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['*'];
}
