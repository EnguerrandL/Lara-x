<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected  $fillable = [
        'comment',
        'idea_id',
    ];




    // protected $casts = [
    //     'created_at' =>  "datetime:Y",
    // ];


    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
