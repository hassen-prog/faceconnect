<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        
        'phone',
        'country',
        'address',
        'town',
        'postcode',
        'description',
        'profile_picture',
    ];

    public function profile()
    {
        return $this->belongsTo(User::class);
        
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }
    protected static function boot()
    {
        parent::boot();

        // Listen for the 'deleting' event on the Profile model
        static::deleting(function ($profile) {
            // Delete all posts related to the profile
            $profile->posts->each->delete();
        });
    }
}









