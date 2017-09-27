<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "level";

    protected $fillable = [
        'level_name', 'level', 'status_show'
    ];
}
