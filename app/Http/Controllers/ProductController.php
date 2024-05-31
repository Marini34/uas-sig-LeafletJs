<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        $products[] = $request->except('_token');
        Storage::put('data/products.json', json_encode($products));
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        $product = $products[$id];
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        $product = $products[$id];
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        $products[$id] = $request->except(['_token', '_method']);
        Storage::put('data/products.json', json_encode($products));
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $products = json_decode(Storage::get('data/products.json'), true);
        array_splice($products, $id, 1);
        Storage::put('data/products.json', json_encode(array_values($products)));
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
