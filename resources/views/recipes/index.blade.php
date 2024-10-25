<!DOCTYPE HTML>
<html>
<head>
    <title>Recipe Organizer</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="container">
        <h1>Recipe List</h1>
        <table class="recipe-table">
            <thead>
                <tr>
                    <th>Recipe Name</th>
                    <th>Ingredients</th>
                    <th>Instructions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ $recipe->ingredients }}</td>
                    <td>{{ $recipe->instructions }}</td>
                    <td>
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
