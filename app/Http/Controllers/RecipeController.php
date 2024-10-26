<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
require_once app_path('Helpers/sort_helper.php');

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $column = $request->input('sort_by', 'id');
        $order = $request->input('order', 'asc');
        $search = $request->input('query');
    
        $recipes = Recipe::when($search, function ($queryBuilder) use ($search) {
            $queryBuilder->where('name', 'like', "%{$search}%")
                         ->orWhere('cuisine', 'like', "%{$search}%");
        })->orderBy($column, $order)->paginate(10);
    
        return view('recipes.index', compact('recipes', 'column', 'order', 'search'));
    }
    
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    // Show the form to create a new recipe
    public function create()
    {
        return view('recipes.create');  // Load the form view
    }

    // Store the newly created recipe in the database
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required',
            'cuisine' => 'required',  // Add this
            'ingredients' => 'required',
            'instructions' => 'required',
        ]);

        // Create a new recipe
        Recipe::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully.');
    }
    
    // Show the edit form
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    // Update the recipe
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    // Delete the recipe
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }
}
