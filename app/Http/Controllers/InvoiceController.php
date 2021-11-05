<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.show', [         
            'invoices' => auth()->user()->invoices(),
            //paginate
        ]);
    }

    public function create()
    {
        return view('invoices.create', [
            'clients' => auth()->user()->clients
        ]);
    }

    public function store(Request $request)
    {

        dd($request);
        // $this->validate($request,[
        //     'user_id' => 'required',
        //     'client_id' => 'required',
        //     'service_name' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'total_price' => 'required'

        // ]);

        // auth()->user()->invoices()->create([
        //     'client_id' => $this->
        //     'service_name' =>
        //     'price' =>
        //     'quantity' =>
        //     'total_price' =>
        // ]);

        // return redirect()->route('invoices');
    }

    public function show (Invoice $invoice)
    {
        return view ('invoices.show-one', ['invoice' => $invoice]);
    }

    public function edit (Invoice $invoice)
    {
        return view('invoices.edit', ['invoice' => $invoice]);
    }

    // public function update (Request $request)
    // {

    //     $this->validate($request,[
            
    //     ]);

    //     $data = Invoice::find($request->id);
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data-> = $request->;
    //     $data->save();

    //     return redirect()->route('invoices');
    // }


    public function destroy (Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices');
    }
}
