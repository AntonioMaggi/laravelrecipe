<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Retrieve the list of all recipes.
     */
    public function index()
    {
        return Recipe::all();
    }

    /**
     * Create a new recipe.
     */
    public function store(Request $request)
    {
        // Validating input data
        $validatedData = $request->validate([
            'recipeTitle' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required|array',
            'instructions' => 'required|array',
            'prepTime' => 'required|numeric',
            'cookingTime' => 'required|numeric',
            'difficultyLevel' => 'required',
        ]);

        // Creating recipe and returning its data
        $recipe = Recipe::create($validatedData);

        return response()->json($recipe, 201);
    }

   
}
