<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns = [
        'productName',
        'productImage',
        'productCategory',
        'productDescription',
        'productCost',
        'productDiscount',
        'active',
    ];
    public function index()
    {
        $products = Product::get();
        return view('admin.product.indexProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data= $request->validate(
        [
        'productName'       => 'required|string|max:255',
        'productImage'      => 'nullable|image',
        'productCategory'   => 'required|string|max:255',
        'productDescription'=> 'required|string|max:500',
        'productCost'       => 'required|numeric|min:0',
        'productDiscount'   => 'required|numeric|min:0',
        'active'            => 'nullable',
        ]
      );


      //$data =$request->only($this->columns);


      Product::create($data);
      return redirect('products') ;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
