<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('price', 'like', "%$search%")
                      ->orWhere('description', 'like', "%$search%");
            })
            ->simplePaginate(5)
            ->appends(['search' => $search]);

        return view('CRUD.product.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('CRUD.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imagename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('productimg'), $imagename);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imagename;
        $product->user_id = auth()->id();
        $product->save();
        
        return redirect('/')->with('success', 'Product has been added successfully');
    }

    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('CRUD.product.show', ['product' => $product]);
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('modify-product', $product);
        return view('CRUD.product.edit', ['product' => $product]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $this->authorize('modify-product', $product);
        
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image && file_exists(public_path('productimg/' . $product->image))) {
                unlink(public_path('productimg/' . $product->image));
            }
            
            $imagename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('productimg'), $imagename);
            $product->image = $imagename;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        
        return redirect('/')->with('success', 'Product has been updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $this->authorize('modify-product', $product);
        
        // Delete associated image file
        if ($product->image && file_exists(public_path('productimg/' . $product->image))) {
            unlink(public_path('productimg/' . $product->image));
        }
        
        $product->delete();
        
        return redirect('/')->with('success', 'Product has been deleted successfully');
    }

 
}
