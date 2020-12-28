<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(Request $request){

        $product = new Product([
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        $product->save();

        return response()->json([
            'message' => 'Successfully created product!'
        ], 201);
    }

    public function products(){
        return DB::table('products')->get();
    }
}
