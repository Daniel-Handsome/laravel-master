<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title','content'];


    //public funtion  名字不能亂取 對照 migrate的名字
    //ex blogPost 對照blog_post  跟建立model一樣對照 依據大駝峰

    //原因是因為我只連結 當前的model 不是像老師一樣指定
    //如果是用id 去聯 就不用寫 

    public function comments()
    {
        return $this->hasMany('App\Comment');    
    }


}
