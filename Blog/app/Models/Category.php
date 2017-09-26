<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categorys";

    protected $fillable = [
        'category_name', 'parent_id', 'slug', 'timeDelete', 'menu_id'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
