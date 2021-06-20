<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{

    // protected $guarded = ['title'];
    protected $fillable = ['title','content'];

    //把array的屬性隱藏 但是可能你在laravel 或其他地方內部 要看到 所以要用Api resource
    // protected $hidden = ['created_at','updated_at'];

    public function  comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function  tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    public function  user()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
