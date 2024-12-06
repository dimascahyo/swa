<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //
        $search = $request->input('searchInput');
        $sort = $request->input('sort');

        $products = Product::whereHas('categories', function ($query) use ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        })->orWhere('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orderBy($sort)->paginate(10);

        return view('searchResult', compact('products'));
    }
}
