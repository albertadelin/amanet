<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contract;

class ContractsController extends Controller
{
    public function tableData()
    {
        $contracts = Contract::all();
        return json_encode(['data' => $contracts]);
    }

    public function index()
    {
        $products = Product::all();

        return view('contract', compact('products'));
    }

    public function create(Request $request)
    {
        $products = Product::all();
        $contracts = new Contract();

        // var_dump($request->input('products'));die();

        $contracts->full_name = $request->input('full_name');
        $contracts->cnp = $request->input('cnp');
        $contracts->telephone = $request->input('telephone');
        $contracts->city = $request->input('city');
        $contracts->address_details = $request->input('address-details');
        $contracts->contract_date =  $request->input('date');
        $contracts->product_id = $request->input('products');
        $contracts->amount = $request->input('amount');

        $contracts->save();

        return redirect()->to('/contract');
    }



    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();

        return response()->json('contractul a fost sters');

    }

    public function update()
    {
        
    }
}
