<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-header/>
    <div class="flex w-screen h-screen">
        <x-side-bar>
            Products
        </x-side-bar>
        <x-content>
            <x-search/>
            <div class="container mx-auto px-4 py-8">
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr class="text-left">  
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Id</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Name</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Category</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Price</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Stock</th>
                                <th class="px-4 py-2 text-sm font-medium text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-sm">{{ $product->id }}</td>
                                <td class="px-4 py-2 text-sm">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm">{{ $product->categories['name'] }}</td>
                                <td class="px-4 py-2 text-sm">$ {{ $product->price }}</td>
                                <td class="px-4 py-2 text-sm">{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('detail', ['id' => $product['id'], 'title' => Str::slug($product['name'])]) }}"
                                        class="text-blue-600/75 hover:text-blue-600/50">
                                        More Details
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 px-4">
                    {{ $products->links() }}
                </div>
            </div>
        </x-content>
    </div>
    <x-footer/>
</body>
</html>