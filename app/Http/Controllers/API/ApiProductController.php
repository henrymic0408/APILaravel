<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('categories')->get();

        if($product){
            return response()->json([
                'success' => true,
                'message' => 'List Data Product',
                'data' => $product,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Product Not Found',
                'data' => '',
            ],404);
        }
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        $image = "";
        if ($request->hasFile('image')) {
           $image = $request->file('image')->store('product','public');
        }else{
            $image = null;
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'category_id' => $request->category_id,
        ]);
        if($product){
            return response()->json([
                'success' => true,
                'message' => 'Create New product Successfull!',
                'data' => $product
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'product fail to save',
                'data' => ''
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(APIproductController $aPIproductController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(APIproductController $aPIproductController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, APIproductController $aPIproductController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(APIproductController $aPIproductController)
    {
        //
    }
}
