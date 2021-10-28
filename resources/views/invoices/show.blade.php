<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-end">
            <x-list.button>
                <a href="{{ route('invoices.create') }}" class=""> + Create New Client</a>
            </x-list.button>
        </div>

        <x-list.heading>Invoice List</x-list.heading>

        {{-- @if ($invoices->count()) 
            @foreach ($invoices as $invoice)
                <x-list.field>
                    <x-list.item value='overflow-hidden' label='Name'>{{ $invoice->name }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Vat ID'>{{ $invoice->vat_id }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Address'>{{ $invoice->address }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='City'>{{ $invoice->city }} </x-list.item>
                    
                    <div class="flex-wrap  justify-around text-sm">
                        <x-list.button color="gray"> 
                            <a href="{{ route('invoice.show', $invoice->name) }}" class="">Show</a>
                        </x-list.button>
                        <x-list.button color="blue"> 
                            <a href="{{ route('invoice.edit',  $invoice->name) }}" class="">Edit</a>
                        </x-list.button>
                        <x-list.button color="red"> 
                            <a href="{{ route('invoice.destroy', $invoice->name) }}" class="">Delete</a>
                        </x-list.button>
                    </div>
                </x-list.field>     
            @endforeach
        @else
            <div class="italic text-center">The list is empty, please add clients</div>
        @endif  --}}
    </x-body>
</x-layout>