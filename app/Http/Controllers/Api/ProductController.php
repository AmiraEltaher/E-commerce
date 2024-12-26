<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::paginate(10);
        return response()->json ($products, 200);
        //return response()->json(Product::all(), 200); without pagination
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data= $request->validate(
            [
            'productName'       => 'required|string|max:255',
            'productImage'      => 'nullable',
            'productCategory'   => 'required|string|max:255',
            'productDescription'=> 'required|string|max:500',
            'productCost'       => 'required|numeric|min:0',
            'productDiscount'   => 'required|numeric|min:0',
            'active'            => 'nullable',
            ]
          );

          $product = Product::create($data);

          return response()->json(['message' => 'Product stored successfully', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if(! $product)
        {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $data = $request->validate([
            'productName'       => 'required|string|max:255',
            'productImage'      => 'nullable',
            'productCategory'   => 'required|string|max:255',
            'productDescription'=> 'required|string|max:500',
            'productCost'       => 'required|numeric|min:0',
            'productDiscount'   => 'required|numeric|min:0',
            'active'            => 'nullable',
        ]);


        // if ($request->hasFile('productImage')) {
        //     $imagePath = $request->file('productImage')->store('products', 'public');
        //     $data['productImage'] = $imagePath;
        // }

        $product->update($data);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $product = Product::find($id);  // Find the product by ID
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);  // Return error if not found
        }

        $product->delete();  // Delete the product
        return response()->json(['message' => 'Product deleted successfully']);  // Return success message
    }
}