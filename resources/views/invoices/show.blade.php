<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-between">
            <x-list.button>
                <a href="{{ route('invoices.index') }}" class="">Back</a>
            </x-list.button>
            <x-list.button>
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="">Edit</a>
            </x-list.button>
        </div>

        <div class="mt-3">
            <div class="float-right"><a class="border p-3 rounded" href="{{ route('generate_pdf', ['download' => 'pdf', 'invoice' => $invoice->id] )}}">Export PDF</a></div>
        </div>

        <div class="invoice_table">
            {{-- Header --}}
            <table class="table mt-5">
                <tbody>
                    <tr>
                        <td class="border-0 pl-0" width="70%">
                            
                        </td>
                        <td class="border-0 pl-0">
                            @if($invoice->status)
                                <h4 class="text-uppercase cool-gray">
                                    {{-- <strong>{{ $invoice->status }}</strong> --}}
                                </h4>
                            @endif
                            <p><strong>Invoice no: {{ $invoice->id }} / 2021</strong></p>
                            <p> <strong>Invoice date: {{ $invoice->date }}</strong></p>
                            <p> <strong>Invoice due date: {{ $invoice->due_date }}</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- From - To --}}
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-0 pl-0 party-header" width="48.5%">
                            From
                        </th>
                        <th class="border-0" width="3%"></th>
                        <th class="border-0 pl-0 party-header">
                            To
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-0">
                            @if ($invoice->user->company_name ) 
                                <p>Company: <strong>{{ $invoice->user->company_name }}</strong>
                                </p>
                            @endif

                            @if ($invoice->user->company_address)
                                <p>Address: {{ $invoice->user->company_address }}</p>
                            @endif

                            @if($invoice->user->vat_id)
                                <p>Vat ID: {{ $invoice->user->vat_id }}</p>
                            @endif

                            @if($invoice->user->phone_number)
                                <p>Phone: {{ $invoice->user->phone_number }}</p>
                            @endif
                        </td>
                        <td class="border-0"></td>
                        <td class="px-0">
                            @if($invoice->client->name)
                                <p>Client: <strong>{{ $invoice->client->name }}</strong></p>
                            @endif

                            @if($invoice->client->address)
                                <p>Address: {{ $invoice->client->address }}</p>
                            @endif

                            @if($invoice->client->vat_id)
                                <p>VAT ID: {{ $invoice->client->vat_id }}</p>
                            @endif

                            @if($invoice->client->phone_number)
                                <p>Phone: {{ $invoice->client->phone_number }}</p>
                            @endif
                        </td>
                    </tr>
                </tbody> 
            </table>

            {{-- Table --}}
            <table class="table table-items">
                <thead>
                    <tr>
                        <th scope="col" class="border-0 pl-0">Service</th>
                        <th scope="col" class="text-center border-0">Quantity</th>
                        <th scope="col" class="text-right border-0">Price</th>                 
                        <th scope="col" class="text-right border-0 pr-0">Total</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Items --}}
                    @foreach($invoice->items ?? '' as $item)
                    <tr>
                        <td class="pl-0">{{ $item->name }}</td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-right">${{ $item->price }}</td>
                        <td class="text-right pr-0">${{ $item->total }}</td>
                    </tr>
                    @endforeach
                    {{-- Summary --}}
                    
                    <tr>
                        <td colspan="2" class="border-0"></td>
                        <td class="text-right pl-0">Grand total</td>
                        <td class="text-right pr-0 total-amount">
                            ${{ $invoice->grand_total }}
                        </td>
                    </tr> 
                </tbody>
            </table>

            {{-- @if($invoice->notes)
                <p>
                    Note: {!! $invoice->notes !!}
                </p>
            @endif --}}

            <p>Total amount is: ${{ $invoice->grand_total }}</p>
            <p>Please pay until: {{ $invoice->due_date }}</p>
        </div>
    </x-body>
</x-layout>