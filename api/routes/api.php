<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;

// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::put('/users/{id}', [UserController::class, 'update']);
// Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/recipes', [RecipeController::class, 'index']);
Route::post('/recipes', [RecipeController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes and endpoints for users

Route::get('/Users', function () {
    $Users = DB::table('Users')->get();
    return response()->json($Users);
  });
 
  Route::post('/Users', function (Request $request) {
   $validatedData = $request->validate([
       'Username' => 'required|max:255',
       'Email' => 'required|email|unique:Users',
       'Password' => 'required',
   ]);
 
   $User = User::create([
       'Username' => $validatedData['Username'],
       'Email' => $validatedData['Email'],
       'Password' => $validatedData['Password'],
       'created_at' => now(),
       'updated_at' => now(),
   ]);
 
   // Ensure the User model is using the HasApiTokens trait
   $token = $User->createToken('auth_token')->plainTextToken;
 
   // Update the remember_token in the database with the new token
   DB::table('Users')
       ->where('id', $user->id)
       ->update(['remember_token' => $token]);
 
   return response()->json(['id' => $user->id, 'token' => $token], 201);
 });
 
 
  // temp token routes
  Route::post('/tokens/create', function (Request $request) {
     $user = User::find(1);
     //return $user;
     $token = $user->createToken('mynewtoken');
     return ['token' => $token->plainTextToken];
 
     // post the plaintexttoken to the user in the database
     $user:: where('id', 1)->update(['remember_token' => $token->plainTextToken]);
  });