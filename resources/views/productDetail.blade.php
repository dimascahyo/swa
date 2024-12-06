<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product['name'] }}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-header />
    <div class="flex w-screen h-screen">
        <x-side-bar>
            Products
        </x-side-bar>
        <x-content>
            <div class="py-4 px-4">
                <h4>Product id: {{ $product['id'] }}</h4>
                <p>Name: {{ $product['name'] }}</p>
                <p>Description: {{ $product['description'] }}</p>
                <p>Price: ${{ $product['price'] }}</p>
                <p>Category: {{ $product->categories['name'] }}</p>
                <p>Stock: {{ $product['stock'] }}</p>
            </div>
        </x-content>
    </div>
    <x-footer/>
</body>
</html>