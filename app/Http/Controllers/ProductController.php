<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->paginate(10);
        return view('product', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('categories')->firstWhere('id', $id);

        return view('productDetail', compact('product'));
    }

    public function create()
    {
        $product = new Product();
        $product->name = 'Product Name';
        $product->description = 'This is a product description.';
        $product->price = 100.00;
        $product->categories_id = 1;
        $product->stock = 50;
        $product->save();
    }

    public function update($id)
    {
        $product = Product::find($id);
        $product->name = 'Updated Product Name';
        $product->description = 'This is new product description.';
        $product->price = 150.00;
        $product->categories_id = 2;
        $product->stock = 40;
        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    public function ajaxSearchView()
    {
        $categories = Category::all();
        $products = Product::all(); // Or initial dataset for page load

        return view('ajaxSearch', compact('categories', 'products'));
    }

    public function ajaxSearch(Request $request)
    {
        $validatedData = $request->validate([
            'keyword' => 'required|string|max:255',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'price_range' => 'required|array',
            'price_range.*' => 'string|in:0-100,101-200,201-300,301-400,401-500',
        ]);
        $products = Product::query();

        if ($validatedData) {
            $products->where(function ($query) use ($request) {
                $query->where('name', 'like', "%{$request->keyword}%")
                    ->orWhere('description', 'like', "%{$request->keyword}%");
            });

            $products->whereIn('categories_id', $request->categories);

            $priceRanges = $request->price_range;
            $products->where(function ($query) use ($priceRanges) {
                foreach ($priceRanges as $range) {
                    [$min, $max] = explode('-', $range);
                    $query->orWhereBetween('price', [(int)$min, (int)$max]);
                }
            });

            $products = $products->orderBy('categories_id')->get();
        }

        return response()->json([
            'html' => view('components.products-card', ['products' => $products])->render(),
        ]);
    }
}
