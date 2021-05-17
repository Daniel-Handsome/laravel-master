<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    //這邊migrate 的外key 名字 所以這邊駝峰會自動轉變
    //跟我們建立model一樣  會轉變 但要小駝峰跟model不一樣
    //ex blog_post_id
    public function blogPost()
    {
        // 這邊要寫 第二個參數是因為 你blog_post_id 寫成post_id的話就要改
        //因為你預設是指到 blog_Post_id
      // return $this->belongsTo('App\BlogPost','post_id');
        return $this->belongsTo('App\BlogPost');    
    }
}
