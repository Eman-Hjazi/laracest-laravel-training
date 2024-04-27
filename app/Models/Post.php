<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //A Post has Mony Comments , comment belongs to Post , Post belongs to User
    protected $fillable =['title','body'];


    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags()  {
        return $this->belongsToMany(Tag::class);
    }
}
