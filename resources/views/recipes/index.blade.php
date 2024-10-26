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
        
        <form action="{{ route('recipes.index') }}" method="GET" style="display: flex; align-items: center; margin-bottom: 1rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <input 
                    type="text" 
                    name="query" 
                    placeholder="Search recipes..." 
                    id="search-input" 
                    value="{{ request('query') }}" 
                />
                
                <button type="submit">
                    🔍 <span>Search</span>
                </button>
                
                <button 
                    type="search-button" 
                    onclick="document.getElementById('search-input').value = ''; this.form.submit();" 
                >
                    ✖️ <span>Clear</span>
                </button>
            </div>
        </form>

        <!-- Recipe Table -->
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
                @forelse ($recipes as $recipe)
                    <tr>
                        <td class="serial-no">{{ $loop->iteration }}</td>
                        <td class="recipe-name">{{ $recipe->name }}</td>
                        <td class="recipe-cuisine">{{ $recipe->cuisine }}</td>
                        <td class="actions">
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-view">View</a>
                            <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <!-- No Data Message Row -->
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 1rem; font-size: 1rem; color: #666;">
                            We're so sorry, but the recipe "{{ request('query') }}" isn’t available in our database yet.
                            <br>
                                Would you like to add it?
                                <button class="btn btn-create"><a href="{{ route('recipes.create') }}">Add New Recipe</a></button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if (!$recipes->isEmpty())
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
    @endif

</body>
</html>
