<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href = "{{ route('clients') }}" class ="">Back</a>
            </x-list.button>
        </div>

        <x-list.heading>New Client</x-list.heading>

        <form action="{{ route('clients.create') }}" method="POST">
            @csrf
                        
            <div class="flex flex-wrap flex-lg-columns justify-around">
                <x-form.input name="name" placeholder="Company LLC / John Doe" type="text" label="Name"/>
                <x-form.input name="company_number" placeholder="SE0000000" type="text" label="Company Number"/>
                <x-form.input name="vat_id" placeholder="SE0000000" type="text" label="VAT ID" />
                <x-form.input name="bank_account" placeholder="000-0000000000000-00" type="text" label="Bank Account"/>
                <x-form.input name="phone_number" placeholder="+44 000000000" type="text" label="Phone Number"/>
                <x-form.input name="email" placeholder="exemple@mail.com" type="email" label="Email"/>
                <x-form.input name="address" placeholder="Meril street 23" type="text" label="Address"/>
                <x-form.input name="city" placeholder="New York" type="text" label="City"/>
                <x-form.input name="country" placeholder="USA" type="text" label="Country"/>
                <x-form.input name="postal_code" placeholder="11720" type="text" label="Postal Code"/>
            </div>
            <x-form.button> Save </x-form.button>
        </form>
    </x-body>
</x-layout>