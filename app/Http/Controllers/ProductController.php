<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }
    
    public function save(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required',
        ]);

        Product::create($data);

        return redirect(route('product.index'))->with('success','Product successfully saved');
    }

    public function read(Product $product) {
        return view('products.read', ['product' => $product]);
    }

    public function edit(Product $product) {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required',
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success','Product successfully update');
    }

    public function delete(Product $product) {
        $product->delete();
        
        return redirect(route('product.index'))->with('success','Product successfully deleted');
    }
}
