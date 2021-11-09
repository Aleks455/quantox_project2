<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.show', [         
            'invoices' => auth()->user()->invoices()->paginate(10),
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
        $this->validate($request,[
            'user_id' => 'required',
            'client_id' => 'required',   
            'grand_total' => 'required',
            'date' => 'required',
            'due_date' => 'required'
        ]);

        auth()->user()->invoices()->create([
            'user_id' => $request->user_id,
            'client_id' => $request->client_id,
            'grand_total' => $request->grand_total,
            'date' => $request->date,
            'due_date' => $request->due_date,
            'remember_token' =>request()->_token,
            
        ]);

        return redirect()->route('invoices.index');
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
        return redirect()->route('invoices.index');
    }
}
