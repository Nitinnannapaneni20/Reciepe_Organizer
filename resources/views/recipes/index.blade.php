<!DOCTYPE html>
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
                <th class="recipe-name">
                <a href="{{ route('recipes.index', ['sort_by' => 'name', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                    Recipe Name {!! $column === 'name' ? ($order === 'asc' ? '↑' : '↓') : '↑' !!}
                </a>
                </th>
                <th class="recipe-cuisine">
                <a href="{{ route('recipes.index', ['sort_by' => 'cuisine', 'order' => $order === 'asc' ? 'desc' : 'asc']) }}">
                    Cuisine {!! $column === 'cuisine' ? ($order === 'asc' ? '↑' : '↓') : '↑' !!}
                </a>
                </th>
                <th class="actions">Actions</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
            <td class="serial-no">{{ $loop->iteration }}</td>
            <td class="recipe-name">{{ $recipe->name }}</td>
            <td class="recipe-cuisine">{{ $recipe->cuisine }}</td>
            <td class="actions">
            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-view">View</a>
                    <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-edit">Edit</a>
                    <form action="/recipes/{{ $recipe->id }}" method="POST" style="display:inline;">
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
