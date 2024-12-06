<div class="bg-slate-300 flex-col w-64">
    <h1 class="ml-20 py-3 mt-14">{{$slot}}</h1>
    @foreach (config('slugs') as $page)
    <ul>
        <li class="py-3 px-6 hover:bg-slate-200">
            <a href="{{route('page', ['slug' => $page['slug']])}}" class="font-medium text-black dark:text-blue-500">{{$page['name']}}</a>
        </li>
    </ul>
    @endforeach
    <ul>
        <li class="py-3 px-6 hover:bg-slate-200">
            <a href="{{route('products.search')}}" class="font-medium text-black dark:text-blue-500"> Product Search</a>
        </li>
    </ul>
    
</div>