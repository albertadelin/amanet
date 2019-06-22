<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contract;
use App\Liquidation;
use PDF;

class ContractsController extends Controller
{
    public function tableData()
    {
        $contracts = Contract::with('products')->get();
        return json_encode(['data' => $contracts]);
    }

    public function index()
    {
        $products = Product::all();
        return view('contract', compact('products'));
    }

    public function indexUpdate($id)
    {
        $contracts = Contract::with('products')->where('contract_id', $id)->get();
        $products = Product::all();

        return view('update_contract', compact('contracts', 'products'));
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'cnp' => 'required|min:13|max:13',
            'telephone' => 'required',
            'city' => 'required',
            'address-details' => 'required',
            'date' => 'required',
            'products' => 'required',
            'amount' => 'required',
        ]);

        $products = Product::all();
        $contracts = new Contract();

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

    public function createLiquidation($contract)
    {
        $lichidare = new Liquidation();
        $product = Product::find($contract->product_id);

        $lichidare->full_name = $contract->full_name;
        $lichidare->cnp = $contract->cnp;
        $lichidare->telephone = $contract->telephone;
        $lichidare->city = $contract->city;
        $lichidare->address_details = $contract->address_details;
        $lichidare->contract_date =  $contract->contract_date;
        $lichidare->product_name = $product->product_name;
        $lichidare->amount = $contract->amount;

        $lichidare->save();

        return redirect()->to('/contract');
    }

    public function destroy($id)
    {
        $contract = Contract::find($id);
        $this->createLiquidation($contract);

        $contract->delete();

        return redirect('/contract');

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|max:255',
            'cnp' => 'required|max:13',
            'telephone' => 'required',
            'city' => 'required',
            'address-details' => 'required',
            'date' => 'required',
            'products' => 'required',
            'amount' => 'required',
        ]);

        $contracts= Contract::find($id);

        $contracts->full_name = $request->input('full_name');
        $contracts->cnp = $request->input('cnp');
        $contracts->telephone = $request->input('telephone');
        $contracts->city = $request->input('city');
        $contracts->address_details = $request->input('address-details');
        $contracts->contract_date =  $request->input('date');
        $contracts->product_id = $request->input('products');
        $contracts->amount = $request->input('amount');
        $contracts->save();

        return redirect('/contract');
    }

    public function generatePdf($id)
    {
        $contract = Contract::find($id);
        $product = Product::find($contract->product_id);
        $data = ['data' => $contract, 'product' => $product];
        $pdf = PDF::loadView('contractPDF', $data);

        $pdfName = $contract->contract_id . "_" 
                    .str_replace(" ", "_", preg_replace('!\s+!', ' ', $contract->full_name)). "_" 
                    .date("Y/m/d").".pdf";

        return $pdf->download($pdfName);
    }
}
