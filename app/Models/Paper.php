<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Paper as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Paper extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function subject(){ //table name in singular
        return $this->hasOne(Subject::class);//model name
    }

    public function user(){ //table name in singular
        return $this->hasMany(User::class);//model name
    }

}
