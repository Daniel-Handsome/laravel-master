<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //這邊不能亂寫 當你有外key 的時候funtion 名字會預設去找 你的名字的id
    //因為預設就是找id
    //另外 是以小陀去找 
    //所以如果你外key叫做 post 這邊涵式名 要post
    //ex  blog_post_id
    //當然你也可以不寫 自己指定
   
}
