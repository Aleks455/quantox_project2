<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = auth()->user()->invoices()
            ->join('clients', 'invoices.client_id', '=', 'clients.id')
            ->where('clients.name', 'like', '%' . request('search') . '%')
            ->orWhere('due_date', 'like', '%' . request('search') . '%');
            
        return view('invoices.index', [         
            'invoices' => $invoices->paginate(10)
        ]);

        // return view('invoices.index', [         
        //     'invoices' =>auth()->user()->invoices()->latest()
        //     ->filter(
        //         request(['search'])
        //     )->paginate(10)->withQueryString()
        // ]);
    
    }

    public function show(Invoice $invoice)
    {   
        return view ('invoices.show', ['invoice' => $invoice]);
    }

    public function create()
    {
        return view('invoices.create', [
            'user' => auth()->user(),
            'clients' => auth()->user()->clients, 
            // 'currentDate' => $this->currentDate(),
        ]);
    }

    public function store(Request $request)
    {
        dd($request);

        $this->validate($request,[
            'client_id' => 'required',   
            'grand_total' => 'required',
            'date' => 'required',
            'due_date' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
        ]);
        // $request['due_date'] = Carbon::createFromFormat('m/d/Y', $request->due_date)->format('Y-m-d');

        auth()->user()->invoices()->create([
            'user_id' => auth()->user()->id,
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

    // public function formateDate($date)
    // {
    //     return Carbon::now()->format('m/d/Y');
    // }

    // public function sendMail($email)
    // {
    //     // $details = [
    //     //     'title' => 'mail from Aleksandra',
    //     //     'body' => 'This is for testing email using smtp',
    //     // ];

    //     // \Mail::to($email)->send(new \App\Mail\myMail($details));

    //     // dd("Email is Sent.");
        
    // }

    public function addClient($client_id)
    {
        return auth()->user()->clients()->finOrFail($client_id);
    }

   




    

}
