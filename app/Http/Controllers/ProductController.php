<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
// use Validator;

class ProductController extends Controller
{

    public function createData(Request $request){
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required | numeric',
            'desc' => 'required | max: 100',
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        Product::create([
            'name'=>$request->product_name,
            'price'=>$request->price,
            'desc'=>$request->desc,
        ]);
        return response()->json([
            'message' => 'success create data',
        ]);
    }
    public function getAllData(){
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    public function getData($id){
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function searchData(Request $request){
        $product = Product::where('name', 'LIKE', '%'.$request->product_name.'%')->get();
        return response()->json([
            'productSearch' => $product
        ]);
    }

    public function updateData(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required | numeric',
            'desc' => 'required | max: 100',
        ]);

        if ($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }
        Product::findOrFail($id)->update([
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc,
        ]);
        return response()->json([
            'message' => 'success update data'
        ]);
    }

    public function deleteData($id){
        Product::destroy($id);
        return response()->json([
            'message' => 'success delete data'
        ]);
    }
}