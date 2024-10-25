<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
        ]);

        // Create a new recipe
        Recipe::create($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
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
