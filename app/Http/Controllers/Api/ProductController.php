<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller

{
    

    public function index()
    {
        $products = Product::all(); 
        return view('productlist.index', compact('products'));
    }
    //this is for ui call function
    public function create()
    {
        $products = Product::all();
        // or paginate(10)
        return view('productlist.create');
    }

    //product are store

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();


        return response()->json([
            'status'  => 200,
            'message' => 'Product added successfully',
        ]);
    }
    //this is for edit ui form call
    public function edit(string $id)
    {
        //  dd('hello');
        // dd($id);
        $product = product::findorfail($id);

        return view('productlist.edit', compact('product'));
    }

    //show all productlist
    public function showAllProduct()
    {
        $products = Product::all();
        return response()->json([
            'status' => 200,
            'message' => "show all product list",
            'data' => $products,
        ]);
    }


    //show all product according its id
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => "Product not found",
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => "Product details",
            'data' => $product,
        ]);
    }
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);


        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found',
            ], 404);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->update();

        return response()->json([
            'message' => 'Product update successfully'
        ]);
    }


    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    //this is delete by product id
    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found',
            ]);
        }

        $product->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Product deleted successfully',
        ]);
    }
}
