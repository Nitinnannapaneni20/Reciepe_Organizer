<!DOCTYPE html>
<html>
<head>
    <title>{{ $recipe->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/show_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar_style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="container">
        <h1>{{ $recipe->name }}</h1>

        @if ($recipe->image)
            <img src="{{ $recipe->image }}" alt="{{ $recipe->name }}" style="max-width: 100%; height: auto;">
        @else
            <p>No image available for this recipe.</p>
        @endif

        <h3>Cuisine:</h3>
        <p>{{ $recipe->cuisine }}</p>
        
        <h3>Ingredients:</h3>
        <p>{{ $recipe->ingredients }}</p>
        
        <h3>Instructions:</h3>
        <p>{{ $recipe->instructions }}</p>

        <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-edit">Edit</a>
        <form action="/recipes/{{ $recipe->id }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Delete</button>
        </form>
    </div>
    
</body>
</html>
