<x-layout>

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <div class=" border-b-2 flex flex-auto justify-end">
                <button class="border border-green-200 rounded p-3 my-5 bg-green-100 hover:bg-green-200">
                    <a href="clients/create" class=""> + Create New Client</a>
                </button>
             </div>

            <h1 class="text-center p-10"> Clients List</h1>

            {{-- {{-- @if (!empty($clients)) -- ne radi}} --}}
                @foreach ($clients as $client)
                    <x-list.field>
                        <x-list.item label='Name'>{{ $client->name }} </x-list.item>
                        <x-list.item label='Vat ID'>{{ $client->vat_id }} </x-list.item>
                        <x-list.item label='Address'>{{ $client->address }} </x-list.item>
                        <x-list.item label='City'>{{ $client->city }} </x-list.item>
                        <div class="flex items-center">
                            <a href="" class="pl-5"> Edit</a>
                            <a href="" class="pl-5"> Delete</a>
                        </div>
            
                    </x-list.field>
                     
                @endforeach
{{-- 
            @else
                <div>Add clients</div>
            @endif --}} 
            {{-- ne radi --}}

        </div>
       
    </div>


</x-layout>