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
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            
        ]);

        auth()->user()->invoices()->create([
            
        ]);

        //message if it's stored successfully

        return redirect()->route('invoices');

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
