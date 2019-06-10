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
        $validatedData = $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $product = new Product();
        $product->product_name = $request->input('name');
        $product->save();

        echo "<script>alert('Produsul a fost salvat!');</script>";
        return redirect()->to('/produse');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/produse');

    }

    public function indexUpdate($id)
    {
        $product = Product::find($id);

        return view('update_produs', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
        ]);

        $product = Product::find($id);
        $product->product_name = $request->input('product_name');
        $product->save();

        return redirect('/produse');
    }

}
