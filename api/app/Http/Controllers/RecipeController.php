<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe; // Importing Recipe model

class RecipeController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }
}
