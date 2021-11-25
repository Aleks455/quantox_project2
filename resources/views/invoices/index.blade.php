<x-layout>
    <x-body>
        @if ($message = Session::get('success'))
            <div class="m-auto font-bold p-2">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="border-b-2 flex flex-auto justify-end">
            <x-list.button>
                <a href="{{ route('invoices.create') }}" class=""> + Create New Invoice</a>
            </x-list.button>
        </div>
    
        <x-list.heading>Invoice List</x-list.heading>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mb-16 w-full">
            <div class="m-auto p-4">
                <!-- Search -->
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                    <form method="GET" action="#">
                        <input type="text"
                            name="search"
                            placeholder="Find something"
                            class="bg-transparent placeholder-black font-semibold text-sm"
                            value="{{ request('search') }}"
                        >
                    </form>
                </div>
            </div>
        </div>

        <div id="app">
            <example-component></example-component>
        </div>

        @if ($invoices->count()) 
            @foreach ($invoices as $invoice)
                <x-list.field>
                    <x-list.item value='overflow-hidden' label='Invoice No'>{{ $invoice->id }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Grand total'>${{ $invoice->grand_total }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Client'>{{ $invoice->client->name }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Invoice Date'>{{ $invoice->date}} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Due Date'>{{ $invoice->due_date }} </x-list.item>
                    <div class="flex-wrap  justify-around text-sm">
                        <x-list.button color="gray"> 
                            <a href="{{ route('invoices.show', $invoice->id) }}" class="">View</a>
                        </x-list.button>
                        <x-list.button color="green"> 
                            <a href="{{ route('generate_pdf', ['download' => 'pdf', 'invoice' => $invoice->id]) }}" class="">Download</a>
                        </x-list.button>
                        <x-list.button color="blue"> 
                            <a href="{{ route('invoices.edit',  $invoice->id) }}" class="">Edit</a>
                        </x-list.button>
                       <form action="{{ route('invoices.destroy', $invoice->id) }}" class="inline">
                            @csrf
                            <x-list.button color="red"> 
                                Delete
                            </x-list.button>
                        </form>
                    </div>
                </x-list.field>     
            @endforeach
        @else
            <div class="italic text-center">There are no invoices, please create new</div>
        @endif 
        <div class="pt-5">                                     
            {{ $invoices->links() }}
        </div>
    </x-body>
</x-layout>