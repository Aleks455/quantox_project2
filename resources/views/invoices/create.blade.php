<x-layout>
    <x-body>
        <script>
            $(document).ready(function()
            {
                var br = 2;

                $(".add-row").click(function(e)
                {
                    e.preventDefault();

                    var markup = 
                    `<tr class='item${br} form-group' id='item${br}'>
                        <td class='table-remove'>
                          <button type="button" id='${br}' class='remove'>&times</button>
                        </td>
                        <td class='table-name pl-0'>
                            <input id='name' class='name${br}' form-control' type='text' name='name[]'>
                        </td>
                        <td class='table-price text-right'>
                            <input id='price' class='price${br}' form-control' type='text' name='price[]' value=''>
                        </td>
                        <td class='table-qty text-center'>
                            <input id='qty' class='qty${br}' form-control' type='text' name='qty[]' value=''>
                        </td> 
                        <td class='table-total text-right pr-0'>
                            <input id='total' class='total${br}' form-control' type='text' name='total[]'  disabled>
                        </td>
                    </tr>`;
                    
                    $("#item_lines tr:last").after(markup);

                    $(".remove").on('click', function (e)
                    {
                        e.preventDefault();

                        id = $(this).attr('id');
                        $("#item"+id).remove();
                        //or this
                        // $(this).closest("#item" + id).remove();

                    });

                    // $('.price, .qty').keyup(function()
                    // {
                    //     var total = 0;

                    //     var x = Number($(".price" + br).val());
                    //     var y = Number($(".qty" + br).val());
                    //     var total = x * y;
                    //     $(".total" + br).val(total);
                    // });

                    br++;
                });

                   

               
                
            });
        </script>

        {{-- Back button --}}

        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href = "{{ route('invoices.index') }}" class ="">Back</a>
            </x-list.button>
        </div>

        {{-- Invoice form  --}}

        <x-list.heading>New Invoice</x-list.heading>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-red-500">{{ $error }}
                </p>
            @endforeach
        @endif
        
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
                                        
                                    </div>
                                    <div class="form-group pb-2"> 
                                        <label for="date"><strong>Invoice date: </strong></label> 
                                        <input name="date" type="date" class="form-control" v-model="form.date" value="{{ old('date') ? old('date') : date('Y-m-d') }}">
                                      
                                    </div>
                                    <div class="form-group pb-2"> 
                                        <label for="due_date"><strong>Invoice due date: </strong></label>
                                        <input name="due_date" type="date" class="form-control" v-model="form.due_date" value="{{ old('due_date') ? old('due_date') : date('Y-m-d', time() + (60 * 60 * 24 * 14))  }}"> 
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
                                    <span class=" button float-right font-bold ">Select the Client</span>
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
                                        Please add client: 
                                        <a href="{{ route('clients.create') }}">New Client</a>
                                        </p>
                                    @endif
                                </td>
                            </tr>
                        </tbody> 
                    </table>

                    <hr>
            
                    {{-- Table --}}
                    <table class="table table-form table-items">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 pl-0"></th>
                                <th scope="col" class="border-0 pl-0">Service</th>
                                <th scope="col" class="text-right border-0">Price</th>                 
                                <th scope="col" class="text-center border-0">Quantity</th>
                                <th scope="col" class="text-right border-0 pr-0">Total</th>
                            </tr>
                        </thead>
                        <tbody id="item_lines">
                            {{-- Items --}}
                            <tr class="item" id="item">
                                <td class="table-remove w-16">
                                </td>
                                <td class="table-name pl-0">
                                    <input id="name" class="table-control name" type="text" name="name[]">
                                </td>
                                <td class="table-price text-right">
                                    <input id="price" class="table-control price" type="text" name="price[]" value="">
                                </td>
                                <td class="table-qty text-center">
                                    <input id="qty" class="table-control qty" type="text" name="qty[]" value="">
                                </td> 
                                <td class="table-total text-right pr-0">
                                    <input id="total" class="total" type="text" name="total[]"  disabled> 
                                    {{-- <input type="text" name="total" jAutoCalc="{qty} * {price}"> --}}
                                </td>
                            </tr>
                        </tbody>

                        {{-- Summary --}}  

                        <tr>
                            <td colspan="3" class="border-0"></td>
                            <td class="text-right pl-0">Grand total</td>
                            <td class="table-grand_total text-right pr-0 total-amount">
                                <input type="text" name="grand_total" class="grand_total" jAutoCalc="SUM({item_total})">
                            </td>
                        </tr>
                        
                    </table>
                    <div class="mt-3">
                        <div>
                            <button class="border p-2 rounded add-row" type="button" name="add" id="add">Add Row</button>
                        </div>
                    </div>
                </div>
            <x-form.button> Save </x-form.button>
        </form>      
    </x-body>
</x-layout>