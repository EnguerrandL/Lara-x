<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'user_id',
    ];

    // Eager loading

    protected $with = [
        'user:id,name,image',
        // 'user',
        'comments.user:id,name,image'
    ];



    public function likes(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
     {
        return $this->hasMany(Comment::class);
     }
}
