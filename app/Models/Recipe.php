<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // Specify table name if it's not 'recipes'
    protected $table = 'recipes';

    // Add any guarded or fillable attributes if needed
    protected $fillable = ['name', 'cuisine', 'ingredients', 'instructions','image'];
}
