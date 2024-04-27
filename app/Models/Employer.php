<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    function jobs()  {
        return $this->hasMany(Job::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
