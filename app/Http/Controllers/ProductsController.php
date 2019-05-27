<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function tableData()
    {
        $products = Product::all();
        return json_encode(['data' => $products]);
    }

    public function index()
    {
        $products = Product::all();

        return view('produs', compact('products'));
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->input('name');
        $product->save();

        echo "<script>alert('Produsul a fost salvat!');</script>";
        return redirect()->to('/produse');
    }

    public function deete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json('produsul a fost sters');

    }

}
