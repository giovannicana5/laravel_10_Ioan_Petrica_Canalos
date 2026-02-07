<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function create() {
        return view('product.create');
    }
    public function store(ProductRequest $request) {
        // dd($request->all());
        // dd($request->all());
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $img = null;
        if($request->file('img')) {
            $img = $request->file('img')->store('img', 'public');
        }
        // dd($request->all());
        // $product = new Product();
        // $product->name = $name;
        // $product->description = $description;
        // $product->price = $price;
        // dd($product);
        // $product->save();
        Product::create(['name' => $name, 'description' => $description, 'price' => $price, 'img' => $img]);
        return redirect()->back()->with('message', 'Prodotto inserito');
    }
    public function index() {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }
}
