<!DOCTYPE HTML>
<html>
<head>
    <title>Recipe Organizer</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar_style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="container">
        <h1>Recipe List</h1>
        <table class="recipe-table">
        <thead>
            <tr>
                <th class="serial-no">S.No</th>
                <th class="recipe-name">Recipe Name</th>
                <th class="ingredients">Ingredients</th>
                <th class="instructions">Instructions</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($recipes as $recipe)
            <tr>
                <td class="serial-no">{{ $loop->iteration }}</td>
                <td class="recipe-name">{{ $recipe->name }}</td>
                <td class="ingredients">{{ $recipe->ingredients }}</td>
                <td class="instructions">{{ $recipe->instructions }}</td>
                <td class="actions">
                    <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-edit">Edit</a>
                    <form action="/recipes/{{ $recipe->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>
