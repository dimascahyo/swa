<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="overflow-x-hidden max-w-full">
    <x-header/>
    <x-content>
        <div class="container mx-auto p-4 max-w-full">
            <div class="flex">
                <!-- Sidebar -->
                <aside class="sm:w-1/4 fixed top-14 left-0 h-screen p-4 bg-white border">
                    <form id="search-form" class="space-y-4">

                        <div>
                            <h2 class="font-medium text-lg">Categories</h2>
                            @foreach ($categories as $category)
                                <label class="block">
                                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="mr-2">
                                    {{ $category->name }}
                                </label>
                            @endforeach
                        </div>

                        <!-- Price Range -->
                        <div>
                            <h2 class="font-medium text-lg">Price Range</h2>
                            <label class="block">
                                <input type="checkbox" name="price_range[]" value="0-100" class="mr-2">
                                $0 - $100
                            </label>
                            <label class="block">
                                <input type="checkbox" name="price_range[]" value="101-200" class="mr-2">
                                $101 - $200
                            </label>
                            <label class="block">
                                <input type="checkbox" name="price_range[]" value="201-300" class="mr-2">
                                $201 - $300
                            </label>
                            <label class="block">
                                <input type="checkbox" name="price_range[]" value="301-400" class="mr-2">
                                $301 - $400
                            </label>
                            <label class="block">
                                <input type="checkbox" name="price_range[]" value="401-500" class="mr-2">
                                $401 - $500
                            </label>
                        </div>

                        <div>
                            <h2 class="font-medium text-lg">Search by Keyword</h2>
                            <input 
                                type="text" 
                                id="search" 
                                name="keyword" 
                                placeholder="Enter keyword here" 
                                class="w-full border border-gray-300 rounded px-2 py-2"
                            >
                        </div>

                        <div>
                            <button type="submit" id="form-submit">Submit</button>
                        </div>
                    </form>
                </aside>
                <!-- Main Content -->
                <main class="ml-auto sm:w-3/4" id="products-container">
                    <h1 class="text-2xl font-bold mb-4">Search Products</h1>
                    <x-products-card :products="$products" />
                </main>
            </div>
        </div>
    </x-content>

    <script>
        $(document).ready(function () {
            $('#form-submit').on('click', function (e) {
                e.preventDefault();
                let formData = $('#search-form').serialize()

                $.ajax({
                    url: "{{ route('products.ajax-search') }}",
                    method: "GET",
                    data: formData,
                    success: function (response) {
                        $('#products-container').html(response.html);
                    },
                    error: function () {
                        console.error('Error fetching search results.');
                    }
                });
            });
        });
    </script>
</body>
</html>
