<x-layout>

    <div class="flex justify-center">
       
        <div class="w-3.5/12 bg-white p-6 rounded-lg">

            <form action="{{ route('register') }}" method="POST">
                <h1 class="text-center mb-4">Please register</h1>

                @csrf

                <x-form.input name="company_name" placeholder="My company LLC" label="Company Name"/>
                <x-form.input name="company_number" placeholder="0000000" label="Company Number"/>
                <x-form.input name="vat_id" placeholder="0000000" label="VAT ID" />
                <x-form.input name="company_address" placeholder="address no." label="Company Address"/>
                <x-form.input name="city" placeholder="Belgrade" label="City"/>
                <x-form.input name="state" placeholder="Serbia" label="State"/>
                <x-form.input name="postal_code" placeholder="11000" label="Postal Code"/>
                <x-form.input name="phone_number" placeholder="+44 600000000" label="Phone Number"/>
                <x-form.input name="bank_account" placeholder="000-0000000000000-00" label="Bank Account"/>

                <x-form.button> Register </x-form.button>
            </form>
        </div>
    </div>
</x-layout>