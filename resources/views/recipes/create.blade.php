<!DOCTYPE html>
<html>
<head>
    <title>Add New Recipe</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        <h1>Add New Recipe</h1>

        <!-- Form for adding a new recipe -->
        <form action="{{ route('recipes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Recipe Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea name="ingredients" id="ingredients" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="instructions">Instructions</label>
                <textarea name="instructions" id="instructions" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-create">Add Recipe</button>
        </form>
    </div>
</body>
</html>
