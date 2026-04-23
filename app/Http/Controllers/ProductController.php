<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['stores', 'warehouses']);
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(10);

        if ($request->ajax()) {
            return view('products.partials.products_table', compact('products'))->render();
        }
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $stores = Store::all();
        $warehouses = Warehouse::all();
        return view('products.create', compact('stores', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->hasFile('image') ? $request->file('image')->store('products', 'public') : null;

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);

        $this->syncRelations($product, $request);

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
        $product->load(['stores', 'warehouses']);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $stores = Store::all();
        $warehouses = Warehouse::all();
        return view('products.edit', compact('product', 'stores', 'warehouses'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle Image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        // Force update basic attributes
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save(); // Use save() instead of update() to be safe

        $this->syncRelations($product, $request);

        return redirect()->route('products.index')->with('success', 'Updated!');
    }

    private function syncRelations($product, $request)
    {
        $product->stores()->sync(array_map('intval', $request->input('stores', [])));
        $product->warehouses()->sync(array_map('intval', $request->input('warehouses', [])));
    }

    public function destroy(Product $product)
    {
        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('products.index');
    }
}
