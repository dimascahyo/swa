<div class="container mx-auto p-4">
    <form action="{{ route('search') }}" method="GET" class="flex flex-col gap-4 md:flex-row items-center bg-white p-4 rounded-lg shadow-md">
        <!-- Search Input -->
        <div class="w-full md:w-auto flex-grow">
            <input 
                type="text" 
                name="searchInput" 
                placeholder="Search here..." 
                value="{{ request('searchInput') }}" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:border-blue-500"
            >
        </div>
        <div class="w-full md:w-auto">
            <select 
                name="sort" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-500 focus:border-blue-500"
            >
                <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>Sort By</option>
                <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>Product ID</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="w-full md:w-auto">
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md focus:ring-4 focus:ring-blue-300"
            >
                Search
            </button>
        </div>
    </form>
</div>
