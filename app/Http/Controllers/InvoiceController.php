<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Client;
use App\Models\Item;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.show', [         
            'invoices' => auth()->user()->invoices()->paginate(10)
            
        ]);
    }

    public function create()
    {
        return view('invoices.create', [
            'user' => auth()->user(),
            'invoices' => auth()->user()->invoices,
            'clients' => auth()->user()->clients,
        ]);
    }

    public function store(Request $request)
    {
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

    public function show(Invoice $invoice)
    {   
        return view ('invoices.show-one', ['invoice' => $invoice]);
    }

    public function edit(Invoice $invoice)
    {
        $this->invoice = $invoice;
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


    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success','Product deleted successfully');
    }

    public function pdfView(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        view()->share('invoice', $invoice);
        
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('invoices.show-one', $invoice);
            return $pdf->download('invoices.show-one.pdf');
            // return $pdf->stream('invoices.show-one.pdf');
        }
        return view('invoices.show-one');
    }

    public function curentDate()
    {
        return Carbon::now();
    }

   

}
