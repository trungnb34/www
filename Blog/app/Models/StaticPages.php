<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    protected $table = "static_pages";

    protected $fillable = [
        'title', 'content', 'slug', 'status_show'
    ];
}
