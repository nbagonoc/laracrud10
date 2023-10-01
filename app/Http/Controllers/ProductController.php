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
        return redirect(route('product.index'));

    }

    public function read($id) {
        $product = Product::findOrFail($id);
        return view('products.read', ['product' => $product]);
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect(route('product.index'))->with('success','Product successfully update');
    }

    public function delete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('product.index'))->with('success','Product successfully deleted');
    }
}
