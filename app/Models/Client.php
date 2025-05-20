<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}