<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-between">
            <x-list.button>
                <a href="{{ route('clients') }}" class="">Back</a>
            </x-list.button>
            <x-list.button>
                <a href="{{ route('client.edit', $client->name) }}" class="">Edit</a>
            </x-list.button>
        </div>

        <div>
            <x-list.item label='Name'>{{ $client->name }}</x-list.item>
            <x-list.item label='Vat ID'>{{ $client->vat_id }} </x-list.item>
            <x-list.item label='Company number'>{{ $client->company_number }}</x-list.item>
            <x-list.item label='Bank account'>{{ $client->bank_account }}</x-list.item>
            <x-list.item label='Phone number'>{{ $client->phone_number }}</x-list.item>
            <x-list.item label='Email'>{{ $client->email }}</x-list.item>
            <x-list.item label='Address'>{{ $client->address }}</x-list.item>
            <x-list.item label='City'>{{ $client->city }}</x-list.item>
            <x-list.item label='Post code'>{{ $client->postal_code }}</x-list.item>
            <x-list.item label='Country'>{{ $client->country }}</x-list.item>


        </div>
    </x-body>
</x-layout>