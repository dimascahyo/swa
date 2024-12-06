@foreach ($products as $product)
<div class="w-full mb-6 px-4 py-4 max-w-full">
    <div class="border rounded-lg p-4 flex">
        <div class="w-24 h-24 bg-gray-200">
            <img src="" alt="">
        </div>
        <div class="w-2/3 pl-4">
                <img src="" alt="">
                <h3 class="font-bold text-lg">{{$product->name}}</h3>
                <p>Price: ${{$product->price}}</p>
                <p>Category: {{$product->categories['name']}}</p>
                <p>Summary: @excerpt($product->description)</p>
                <div class="item-text-right">
                    <a href="{{ route('detail', ['id' => $product['id'], 'title' => Str::slug($product['name'])]) }}"
                        class="text-blue-600/75 hover:text-blue-600/50 right-0">
                        More Details
                    </a>
                </div>
                
        </div>
    </div>
</div>
@endforeach