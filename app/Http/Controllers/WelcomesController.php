<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomesController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('welcome', compact('products'));
    }

    public function saveProduct(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->input('name');
        $product->save();

        echo "<script>alert('Produsul a fost salvat!');</script>";
        return redirect()->to('/');
    }

}
