<?php

namespace App\Http\Controllers;

use App\Models\ImagesHandle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class imgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $produits = ImagesHandle::all();
        return view('index' , compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produit' => 'required|string|max:255',
            'image' => 'required|image|max:2048|mimes:png,jpg,gif'
        ]);

        if($request->hasfile('image')){
            $imagepath = $request->file('image')->store('uploads' , 'public');
            $validated['imagepath'] = $imagepath;
        }

        ImagesHandle::create([
            'produit'=>$validated['produit'],
            'imagepath'=>$imagepath??null,
        ]);
        return redirect()->route('products.index')->with('success' , 'image Uploaded!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagesHandle $product)
    {   

        return view('edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagesHandle $product)
    {
        $validated = $request->validate([
            'produit'=>'string|max:255|required',
            'image'=>'image|mimes:jpg,png,jpeg|nullable'
        ]); 

        //check if theres an image 

        if($request->hasFile('image')){
            //delete the image
            if($product->imagepath){
                Storage::disk('public')->delete($product->imagepath);
            }   
            //replace the old image with a the new one

            $path = $request->file('image')->store('uploads' , 'public');
            $product->imagepath = $path;


            };
        $product->update($validated);
            
        return redirect()->route('products.index')->with('success' , 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagesHandle $product)
    {
        

        if($product->imagepath){
            Storage::disk('public')->delete($product->imagepath);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success' , 'Product deleted succesfully');
    }
}
