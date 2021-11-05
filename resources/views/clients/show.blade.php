<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-end">
            <x-list.button>
                <a href="{{ route('clients.create') }}" class=""> + Create New Client</a>
            </x-list.button>
        </div>

        <x-list.heading>Clients List</x-list.heading>

        @if ($clients->count()) 
            @foreach ($clients as $client)
                <x-list.field>
                    <x-list.item value='overflow-hidden' label='Name'>{{ $client->name }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Vat ID'>{{ $client->vat_id }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='Address'>{{ $client->address }} </x-list.item>
                    <x-list.item value='overflow-hidden' label='City'>{{ $client->city }} </x-list.item>
                    
                    <div class="flex-wrap  justify-around text-sm">
                        <x-list.button color="gray"> 
                            <a href="{{ route('client.show', $client->name) }}" class="">Show</a>
                        </x-list.button>
                        <x-list.button color="blue"> 
                            <a href="{{ route('client.edit',  $client->name) }}" class="">Edit</a>
                        </x-list.button>
                        <form action="{{ route('client.destroy', $client->name) }}" class="inline">
                            @csrf
                            <x-list.button color="red"> 
                                Delete
                            </x-list.button>
                        </form>
                    </div>
                </x-list.field>     
            @endforeach
        @else
            <div class="italic text-center">The list is empty, please add clients</div>
        @endif 
    </x-body>
</x-layout>