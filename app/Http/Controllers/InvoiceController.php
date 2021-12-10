<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Item;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use FontLib\TrueType\Collection;
use Illuminate\Support\Facades\Mail;
use PhpParser\ErrorHandler\Collecting;

class InvoiceController extends Controller
{
    public function index()
    {

        return view('invoices.index', [         
            'invoices' => auth()->user()->invoices()
            ->select('invoices.id', 'client_id', 'grand_total', 'date', 'due_date')
            ->join('clients','invoices.client_id' , '=',  'clients.id')
            ->filter(
                request(['search'])
            )
            ->paginate(10)->withQueryString()
        ]);
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
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request,[
            'client_id' => 'required',   
            'grand_total' => 'required',
            'date' => 'required',
            'due_date' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'total' => 'required',
        ]);
        // $request['due_date'] = Carbon::createFromFormat('m/d/Y', $request->due_date)->format('Y-m-d');

        $grand_total = 0;
        foreach($request->total as $item_price) {
            $grand_total += $item_price;
        }

        Invoice::create([
            'user_id' => auth()->user()->id,
            'client_id' => $request->client_id,
            'date' => Carbon::now()->format('Y-m-d'),
            'due_date' => $request->due_date,
            'grand_total' => $grand_total,            
        ]);

        for($i = 0; $i < sizeof($request->qty); $i++)
        { 
            $items[] = [
                'invoice_id' => $this->id,
                'name' => $request->name[$i],
                'price' => $request->price[$i],
                'qty' => $request->qty[$i],
                'total' => $request->total[$i]
            ];
        }
    
        Item::insert($items);
        
    

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

    public function pdfExport(/*Request $request,*/ $id)
    {
        $invoice = Invoice::findOrFail($id);
        view()->share('invoice', $invoice);
        
        // if ($request->has('download')) {
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('invoices.pdf', $invoice);
            return $pdf->download('invoice.pdf');
        // }
        // return view('invoices.index')->with('message', 'Invoice can't be found.');
    }


    // public function pdfLoad($id)
    // {
    //     $invoice = Invoice::findOrFail($id);
    //     view()->share('invoice', $invoice);
    //     PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
    //     $pdf = PDF::loadView('invoices.pdf', $invoice);
    //     return $pdf;
    // }

    public function sendMail($email)
    {
            // $details = [
            //     'title' => 'mail from Aleksandra',
            //     'body' => 'This is for testing email using smtp',
            // ];
        Mail::to($email)->send(new WelcomeMail());
        return new WelcomeMail();
        
        return redirect()->route('invoices.index')->with('success','Email was sent successfully.');
 

        // dd("Email is Sent.");
        
    }

      // public function formateDate($date)
    // {
    //     return Carbon::now()->format('m/d/Y');
    // }

    // public function addClient($client_id)
    // {
    //     return auth()->user()->clients()->finOrFail($client_id);
    // }

   




    

}
