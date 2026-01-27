<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $products = Product::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('price', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        })
        ->simplePaginate(5)
        ->appends(['search' => $search]);

    return view('product.index', compact('products', 'search'));
}

    public function create()
    {
        return view('product.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);

        $imagename = time().'.'.$request->image->extension();
        $request->image->move(public_path('productimg'),$imagename);

        $product = new product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imagename;
        $product->save();
        return redirect('/')->with('success','Product has been added successfully');
    }

   
        public function show(string $id)
        {
            $product = product::where('id',$id)->first();
            return view('product.show', ['product'=>$product]);
        }

   
    public function edit(string $id)
    {
        $product = product::where('id', $id)->first();
        return view('product.edit', ['product' => $product]);
    }

    
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'image'=>'mimes:jpg,png,jpeg'
        ]);

        $product = product::find($id);
        
        if ($request->hasFile('image')) {
            $imagename = time().'.'.$request->image->extension();
            $request->image->move(public_path('productimg'),$imagename);
            $product->image = $imagename;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return redirect('/')->with('success','Product has been updated successfully');
    }

   
    public function destroy(string $id)
    {
        $product = product::where('id', $id)->first();
        if ($product) {
            $product->delete();
        }
        return redirect('/')->with('success','Product has been deleted successfully');
    }
}
