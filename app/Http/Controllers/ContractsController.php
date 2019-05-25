<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ContractsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('contract', compact('products'));
    }
}
