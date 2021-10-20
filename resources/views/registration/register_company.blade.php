<x-layout>

    <div class="flex justify-center">
       
        <div class="w-3.5/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-4">Please register</h1>

            <form action="" method="POST">

                <x-form.input_register name="company_name" placeholder="My company LLC" label="Company Name"/>
                <x-form.input_register name="company_number" placeholder="0000000" label="Company Number"/>
                <x-form.input_register name="vat_id" placeholder="0000000" label="VAT ID" />
                <x-form.input_register name="company_address" placeholder="address no." label="Company Address"/>
                <x-form.input_register name="city" placeholder="Belgrade" label="City"/>
                <x-form.input_register name="state" placeholder="Serbia" label="State"/>
                <x-form.input_register name="postal_code" placeholder="11000" label="Postal Code"/>
                <x-form.input_register name="phone_number" placeholder="0600000000" label="Phone Number"/>
                <x-form.input_register name="bank_account" placeholder="000-0000000000000-00" label="Bank Account"/>

                <x-form.button />
            </form>
        </div>
    </div>
</x-layout>