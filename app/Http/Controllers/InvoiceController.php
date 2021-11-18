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
        // return view('invoices.show', [         
        //     'invoices' => auth()->user()->invoices()->paginate(10)
        // ]);
        return view('invoices.index', [         
            'invoices' => auth()->user()->invoices()->latest()->filter(
                request(['search', 'client', 'date', 'due_date'])
            )->paginate(10)->withQueryString()
        ]);
    //    return view('invoices.index', [  
    //     'invoices' => Invoice::latest()->with('user','client')->get()
    //     ]);
    }

    public function show(Invoice $invoice)
    {   
        return view ('invoices.show', ['invoice' => $invoice]);
    }

    public function create()
    {
        // dd(auth()->user()->invoices());

        return view('invoices.create', [
            'user' => auth()->user(),
            'client' => auth()->user()->clients()->first(), 
            'currentDate' => $this->currentDate(),
            // dodati sve klijente kad napravim u opciju za odabir/, ipreko usera da ih izabiram
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'client_id' => 'required',   
            'grand_total' => 'required',
            'due_date' => 'required'
        ]);
        $request['due_date'] = Carbon::createFromFormat('m/d/Y', $request->due_date)->format('Y-m-d');

        auth()->user()->invoices()->create([
            // 'user_id' => auth()->user()->id,
            'client_id' => $request->client_id,
            'grand_total' => $request->grand_total,
            'date' => Carbon::now()->format('Y-m-d'),
            'due_date' => $request->due_date,
            'remember_token' =>request()->_token,
            
        ]);

        return redirect()->route('invoices.index');
    }

    public function edit(Invoice $invoice)
    {
        $this->invoice = $invoice;
        return view('invoices.edit', ['invoice' => $invoice]);
    }

    // public function update (Request $request)
    // {

    //     $this->validate($request,[
            // validate all, but save only client id
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

    public function pdfExport(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        view()->share('invoice', $invoice);
        
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('invoices.pdf', $invoice);
            return $pdf->download('invoice.pdf');
        }
        return view('invoices.show-one');
    }

    public function currentDate()
    {
        return Carbon::now()->format('m/d/Y');
    }


    

}
