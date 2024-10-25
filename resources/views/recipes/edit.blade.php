<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <input type="text" name="name" id="name" class="form-control" value="{{ $recipe->name }}" required>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea name="ingredients" id="ingredients" class="form-control" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea name="instructions" id="instructions" class="form-control" required>{{ $recipe->instructions }}</textarea>
            </div>

            <button type="submit" class="btn btn-edit">Update Recipe</button>
        </form>
    </div>
</body>
</html>
