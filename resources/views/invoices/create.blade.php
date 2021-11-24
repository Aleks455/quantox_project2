<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href = "{{ route('invoices.index') }}" class ="">Back</a>
            </x-list.button>
        </div>

        <x-list.heading>New Invoice</x-list.heading>
        
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf             
                <div class="invoice_table table_create mb-12">
                    <table class="table mt-5">
                        <tbody>
                            <tr>
                                <td class="border-0 pl-0" width="70%">
                                
                                </td>
                                <td class="border-0 pl-0">
                                    {{-- @if($invoice->status) --}}
                                        <h4 class="text-uppercase cool-gray">
                                            {{-- <strong>{{ $invoice->status }}</strong> --}}
                                        </h4>
                                    {{-- @endif --}}
                                    <p> <strong>Invoice date: </strong> 
                                        <input type="date" value="{{ old('date') ? old('date') : date('Y-m-d') }}">
                                        {{-- format the date --}}
                                    </p>
                                    <p> <strong>Invoice due date: </strong>
                                        <input type="date" value="{{ old('due_date') ? old('due_date') : date('Y-m-d', time() + (60 * 60 * 24 * 14))  }}">
                                       
                                    </p>
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
                                <div class="float-right">
                                    <label for="get_client" class="font-bold">Search for client: </label>
                                    <select onclick="clientID()" name="get_client_id" id="get_client_id" class="">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <th class="border-0 pl-0 party-header">
                                    To   
                                </th>
                            </tr>
                           
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-0">
                                    @if ($user->company_name ) 
                                        <p>Company: <strong>{{ $user->company_name }}</strong>
                                        </p>
                                    @else
                                    <p class="text-red-500">
                                    Please fill out company name: <a href="{{ route('user') }}">Profile</a>
                                    </p>
                                    @endif
            
                                    @if ($user->company_address)
                                        <p>Address: {{ $user->company_address }}</p>
                                    @else
                                    <p class="text-red-500">
                                    Please fill out company address: <a href="{{ route('user') }}">Profile</a>
                                    </p>    
                                    @endif
            
                                    @if($user->vat_id)
                                        <p>Vat ID: {{ $user->vat_id }}</p>
                                    @else
                                    <p class="text-red-500">
                                    Please fill out VAT ID: <a href="{{ route('user') }}">Profile</a>
                                    </p>
                                    @endif
            
                                    @if($user->phone_number)
                                        <p>Phone: {{ $user->phone_number }}</p>
                                    @else
                                    <p class="text-red-500">
                                    Please fill out phone number: <a href="{{ route('user') }}">Profile</a>
                                    </p>
                                    @endif
                                </td>
                                <td class="border-0"></td>
                                <td class="px-0">
                                    @if($client->id?? '')
                                        <p>Client: <strong>{{$name = $client->name }}</strong></p>
                                        <p>Address: {{ $client->address }}</p>
                                        <p>VAT ID: {{ $client->vat_id }}</p>
                                        <p>Phone: {{ $client->phone_number }}</p>
                                    @else
                                    <p class="text-red-500">
                                    Please add client: <a href="{{ route('clients.create') }}">New Client</a>
                                    </p>
                                    @endif
                                </td>
                            </tr>
                        </tbody> 
                    </table>
            
                    {{-- Table --}}
                    <table class="table table-items">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 pl-0"></th>
                                <th scope="col" class="border-0 pl-0">Service</th>
                                <th scope="col" class="text-center border-0">Quantity</th>
                                <th scope="col" class="text-right border-0">Price</th>                 
                                <th scope="col" class="text-right border-0 pr-0">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Items --}}
                            <tr name="line_items">
                                <td><button name="remove" class="border btn-sm p-2 rounded">Remove</button></td>
                                <td class="pl-0"><input type="text" name="item"></td>
                                <td class="text-center"><input type="text" name="qty" value="3"></td>
                                <td class="text-right"><input type="text" name="price" value="120"></td>
                                <td class="text-right pr-0 "><input type="text" name="item_total" jAutoCalc="{qty} * {price}"></td>
                            </tr>
                            {{-- Summary --}}
                            <tr>
                                <td colspan="3" class="border-0"></td>
                                <td class="text-right pl-0">Grand total</td>
                                <td class="text-right pr-0 total-amount">
                                   <input type="text" name="grand_total" jAutoCalc="SUM({item_total})">
                                </td>
                            </tr> 
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <div><button class="border p-2 rounded" type="button" name="add" id="add" class="btn btn-primary">Add Row</button></div>
                    </div>
            
                    {{-- @if($invoice->notes)
                        <p>
                            Note: {!! $invoice->notes !!}
                        </p>
                    @endif --}}
                </div>
            <x-form.button> Save </x-form.button>
        </form>
        {{-- <script src="js/jquery.min.js"></script>
        <script src="js/jautocalc.js"></script>
        <script src="js/script.js"></script> --}}
        <script>
        var clients;
            function clientId() {
                var client_id = document.getElementById('get_client_id').value;
                console.log(client_id);
            }
            // clientId();
        </script>        
    </x-body>
</x-layout>