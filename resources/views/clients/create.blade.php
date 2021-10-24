{{-- form for adding new client. returns to the client list  --}}

<x-layout>

    <div class="flex justify-center">
       
        <div class="w-3.5/12 bg-white p-6 rounded-lg">

            <form action="{{ route('clients.create') }}" method="POST">
                @csrf
                
                <h1 class="text-center mb-4">Please register</h1>

                <x-form.input name="name" placeholder="Company LLC / John Doe" type="text" label="Name"/>
                <x-form.input name="company_number" placeholder="SE0000000" type="text" label="Company Number"/>
                <x-form.input name="vat_id" placeholder="SE0000000" type="text" label="VAT ID" />
                <x-form.input name="bank_account" placeholder="000-0000000000000-00" type="text" label="Bank Account"/>
                <x-form.input name="phone_number" placeholder="+44 000000000" type="text" label="Phone Number"/>
                <x-form.input name="email" placeholder="exemple@mail.com" type="email" label="Email"/>
                <x-form.input name="address" placeholder="Meril street 23" type="text" label="Address"/>
                <x-form.input name="city" placeholder="New York" type="text" label="City"/>
                <x-form.input name="country" placeholder="USA" type="text" label="Country"/>
                <x-form.input name="postal_code" placeholder="11720" type="number" label="Postal Code"/>

                <x-form.button> Register </x-form.button>
            </form>
        </div>
    </div>
</x-layout>