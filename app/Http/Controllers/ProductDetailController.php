<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailController extends Controller
{
    public function index($id)
    {
        $product = Product::with('categories')->firstWhere('id', $id);

        return view('productDetail', compact('product'));
    }
}
