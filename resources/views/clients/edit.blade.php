<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href="{{ route('clients') }}" class="">Back</a>
            </x-list.button>
        </div>

        <x-list.heading>New Client</x-list.heading>

        <form action="{{ route('client.update') }}" method="POST">
            @csrf
                        
            <x-form.input name="id" placeholder="" type="hidden" label="" value="{{ $client->id }}" />

            <div class="flex flex-wrap flex-lg-columns justify-around">

                <x-form.input name="name" placeholder="Company LLC / John Doe" type="text" label="Name" value="{{ $client->name }}" />
                <x-form.input name="company_number" placeholder="SE0000000" type="text" label="Company Number" value="{{ $client->company_number }}" />
                <x-form.input name="vat_id" placeholder="SE0000000" type="text" label="VAT ID" value="{{ $client->vat_id }}" />
                <x-form.input name="bank_account" placeholder="000-0000000000000-00" type="text" label="Bank Account" value="{{ $client->bank_account }}"/>
                <x-form.input name="phone_number" placeholder="+44 000000000" type="text" label="Phone Number" value="{{ $client->phone_number }}"/>
                <x-form.input name="email" placeholder="exemple@mail.com" type="email" label="Email" value="{{ $client->email }}"/>
                <x-form.input name="address" placeholder="Meril street 23" type="text" label="Address" value="{{ $client->address }}"/>
                <x-form.input name="city" placeholder="New York" type="text" label="City" value="{{ $client->city }}"/>
                <x-form.input name="country" placeholder="USA" type="text" label="Country" value="{{ $client->country }}"/>
                <x-form.input name="postal_code" placeholder="11720" type="text" label="Postal Code" value="{{ $client->postal_code }}"/>

            </div>
            <x-form.button> Update </x-form.button>

        </form>
    </x-body>
</x-layout>