<!DOCTYPE HTML>
<html>
<head>
    <title>Recipe List</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
@include('partials.navbar')


<h1>Recipe List</h1>

@foreach($recipes as $recipe)
    <h2>{{ $recipe->name }}</h2>
    <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
    <p><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
    <hr>
@endforeach

</body>
</html>
