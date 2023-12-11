<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{    
    protected $fillable = ['comment'];

    public function profilecomment()
    {
        return $this->belongsTo(Profile::class);
    }

    public function postcomment()
    {
        return $this->belongsTo(Post::class);
    }

}
