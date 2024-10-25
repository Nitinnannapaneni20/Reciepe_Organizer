<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');

// Route to show edit form
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');

// Route to update a recipe
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');

// Route to delete a recipe
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
