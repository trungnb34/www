<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    protected $table = "feed_backs";
    protected $fillable = [
        'user_id', 'datetime', 'content', 'is_read'
    ];
}
