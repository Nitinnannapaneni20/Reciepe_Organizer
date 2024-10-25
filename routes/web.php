<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

// Route to show the form to create a new recipe
Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');

// Route to store the newly created recipe
Route::post('/', [RecipeController::class, 'store'])->name('recipes.store');

// Route to show edit form
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

// Route to update a recipe
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');

// Route to delete a recipe
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
