<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addproduct(Request $request)
    {
        Product::create([
            'pname' => $request->productname,
            'pprice' => $request->productprice,
            'pcat' => $request->productcat,
            'pdesc' => $request->productdesc
        ]);
        return response()->json(["msg" => "product added succesfully"]);
    }
    public function showproducts()
    {
        return response()->json(["Products" => Product::all()]);
    }
    public function singleproduct(Product $productId)
    {
        return response()->json(['product' => $productId]);
    }
    public function updateproduct(Request $request, Product $productId)
    {
        $productId->update([
            'pname' => $request->productname,
            'pprice' => $request->productprice,
            'pcat' => $request->productcat,
            'pdesc' => $request->productdesc
        ]);
        return response()->json(["msg" => "product Updated succesfully"]);
    }
    public function delete(Product $id)
    {
        $id->delete();
        return response()->json(['msg' => 'deleted']);
    }
}
