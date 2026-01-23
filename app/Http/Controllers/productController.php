<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('product.index', ['products'=>product::simplePaginate(5)]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::where('id',$id)->first();
        return view('product.show', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::where('id', $id)->first();
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::where('id', $id)->first();
        if ($product) {
            $product->delete();
        }
        return redirect('/')->with('success','Product has been deleted successfully');
    }
}
