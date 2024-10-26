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
        <form action="{{ route('recipes.index') }}" method="GET" style="display: flex; align-items: center;">
    <div style="display: flex; align-items: center; gap: 0.5rem;">
        <input 
            type="text" 
            name="query" 
            placeholder="Search recipes..." 
            id="search-input" 
            value="{{ request('query') }}" 
            style="padding-left: 1rem; font-size: 1rem; height: 2.4rem;"
        />
        
        <button type="submit" style="display: flex; align-items: center; gap: 0.3rem; font-size: 1rem;">
            🔍 <span>Search</span>
        </button>
        
        <button 
            type="search-button" 
            onclick="document.getElementById('search-input').value = ''; this.form.submit();" 
            style="display: flex; align-items: center; gap: 0.3rem; font-size: 1rem;"
        >
            ✖️ <span>Clear</span>
        </button>
    </div>
</form>

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

    <div class="pagination-container">
        <p>
            Showing {{ $recipes->firstItem() }} to {{ $recipes->lastItem() }} of {{ $recipes->total() }} results
        </p>
        
        <div class="pagination-links">
            @if ($recipes->onFirstPage())
                <span class="disabled">Previous</span>
            @else
                <a href="{{ $recipes->previousPageUrl() }}">Previous</a>
            @endif

            @foreach ($recipes->getUrlRange(1, $recipes->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="{{ $page == $recipes->currentPage() ? 'active' : '' }}">{{ $page }}</a>
            @endforeach

            @if ($recipes->hasMorePages())
                <a href="{{ $recipes->nextPageUrl() }}">Next</a>
            @else
                <span class="disabled">Next</span>
            @endif
        </div>
    </div>

</body>
</html>
