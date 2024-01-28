<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipeTitle',
        'description',
        'ingredients',
        'instructions',
        'prepTime',
        'cookingTime',
        'difficultyLevel',
    ];

    // If you want to cast certain attributes to specific types
    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array',
    ];

    // You might want to customize the table name if needed
    protected $table = 'recipes';
}
