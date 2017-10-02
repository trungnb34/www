<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    protected $table = "post_types";

    protected $fillable = [
        'post_type_name', 'status_show'
    ];
}
