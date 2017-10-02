<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";
    protected $fillable = [
        'title', 'slug', 'avartar' , 'fulltext', 'approval', 'time_delete', 'user_id', 'category_id', 'post_type_id'
    ];
}
