<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="{{ asset('css/edit_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar_style.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        <h1>Edit Recipe</h1>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Recipe Name</label>
                <input type="text" name="name" id="name" value="{{ $recipe->name }}" required>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea name="ingredients" id="ingredients" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea name="instructions" id="instructions" required>{{ $recipe->instructions }}</textarea>
            </div>

            <button type="submit">Update Recipe</button>
        </form>
    </div>
    
</body>
</html>
