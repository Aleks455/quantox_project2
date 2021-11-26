<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href = "{{ route('invoices.index') }}" class ="">Back</a>
            </x-list.button>
        </div>

        <div id="invoice">
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
                                        <div class="form-group pb-2"> 
                                            <label for="status"><strong>Invoice status:</strong></label>
                                            <select name="status" type="text" class="form-control" v-model="form.status" value="{{ old('status') ? old('status') : "" }}">
                                                <option value="draft">Draft</option>
                                                <option value="draft">Sent</option>
                                                <option value="draft">Paid</option>
                                            </select>
                                            {{-- <p v-if="errors.status" class="error">@{{ errors.date[0] }}</p> --}}
                                        </div>
                                        <div class="form-group pb-2"> 
                                            <label for="date"><strong>Invoice date: </strong></label> 
                                            <input name="date" type="date" class="form-control" v-model="form.date" value="{{ old('date') ? old('date') : date('Y-m-d') }}">
                                            {{-- <p v-if="errors.date" class="error">@{{ errors.date[0] }}</p> --}}
                                        </div>
                                        <div class="form-group pb-2"> 
                                            <label for="due_date"><strong>Invoice due date: </strong></label>
                                            <input name="due_date" type="date" class="form-control" v-model="form.due_date" value="{{ old('due_date') ? old('due_date') : date('Y-m-d', time() + (60 * 60 * 24 * 14))  }}">
                                            {{-- <p v-if="errors.date" class="error">@{{ errors.due_date[0] }}</p> --}}
                                        </div>
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
                                                {{ $client_id = $client->id }}
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="client_id" id="client_id" value="{{ $client_id }}">
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
                                        @if($client->id)
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

                        <div v-if="errors.items_empty">
                            <p class="alert alert-danger">@{{ errors.items_empty[0] }}</p>
                        </div>

                        <hr>
                
                        {{-- Table --}}
                        <table class="table table-form table-items">
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
                                <tr v-for="item in form.items" name="line_items">
                                    <td class="table-remove">
                                        <span @click="remove(product)" class="table-remove-btn">&times;</span>
                                        {{-- <button name="remove" class="border btn-sm p-2 rounded">Remove</button> --}}
                                    </td>
                                    <td class="table-name pl-0" :class="{'table-error': errors['items.' + $index + '.name']}">
                                        <input class="table-control" v-model="item.name" type="text" name="item_name">
                                    </td>
                                    <td class="table-qty text-center" :class="{'table-error': errors['items.' + $index + '.qty']}"">
                                        <input class="table-control" v-model="item.qty" type="text" name="qty" value="">
                                    </td>
                                    <td class="table-price text-right" :class="{'table-error': errors['items.' + $index + '.price']}">
                                        <input class="table-control" v-model="item.price" type="text" name="price" value="">
                                    </td>
                                    <td class="table-total text-right pr-0">
                                        <span class="table-text">@{{ product.qty * product.price }}</span>
                                        {{-- <input type="text" name="item_total" jAutoCalc="{qty} * {price}"> --}}
                                    </td>
                                </tr>
                                {{-- Summary --}}
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="text-right pl-0">Grand total</td>
                                    <td class="table-grand_total text-right pr-0 total-amount" :class="{'table-error': errors.grand_total]}">
                                        <input type="text" class="table-grant_total_input" v-model="form.grand_total" name="grand_total" jAutoCalc="SUM({item_total})">

                                        {{-- <input type="text" name="grand_total" jAutoCalc="SUM({item_total})"> --}}
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
        </div>
        {{-- <script src="js/jquery.min.js"></script>
        <script src="js/jautocalc.js"></script>
        <script src="js/script.js"></script> --}}
       @push('scripts')
           <script src="/js/vue.min.js"></script>
           <script src="/js/vue-resource.min.js"></script>
           <script src="js/invoice.js"></script>
           <script type="text/javascript">
                Vue.http.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}';

                window._form = {
                    status = '',
                    date = '',
                    due_date = '',
                    client_id = '',
                    items = [{
                        name = '',
                        qty = 1,
                        price = 0,
                    }]
                }
           </script>
           <script src="/js/app.js"></script>
       @endpush      
    </x-body>
</x-layout>