<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button color="green">
                <a href="{{ route('user') }}" class="">Back</a>
            </x-list.button>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            
            <x-list.heading>New Client</x-list.heading>
            
            <x-form.input name="id" placeholder="" type="hidden" label="" value="{{ $user->id }}" />

            <div class="flex flex-wrap flex-lg-columns justify-around">
                <x-form.input name="first_name" placeholder="John" type="text" label="First Name" value="{{ $user->first_name }}" />
                <x-form.input name="last_name" placeholder="Doe" type="text" label="Last Name" value="{{ $user->last_name }}" />
                <x-form.input name="email" placeholder="exemple@mail.com" type="email" label="Email" value="{{ $user->email }}"/>
                <x-form.input name="password" placeholder="" type="password" label="Password" value=""/>
                <x-form.input name="phone_number" placeholder="+44 000000000" type="text" label="Phone Number" value="{{ $user->phone_number }}"/>
                <x-form.input name="company_name" placeholder="Company name" type="text" label="Company Name" value="{{ $user->company_name }}"/>
                <x-form.input name="company_number" placeholder="SE0000000" type="text" label="Company Number" value="{{ $user->company_number }}" />
                <x-form.input name="vat_id" placeholder="SE0000000" type="text" label="VAT ID" value="{{ $user->vat_id }}" />
                <x-form.input name="bank_account" placeholder="000-0000000000000-00" type="text" label="Bank Account" value="{{ $user->bank_account }}"/>
                <x-form.input name="address" placeholder="Meril street 23" type="text" label="Address" value="{{ $user->company_address }}"/>
                <x-form.input name="city" placeholder="New York" type="text" label="City" value="{{ $user->city }}"/>
                <x-form.input name="country" placeholder="USA" type="text" label="Country" value="{{ $user->state }}"/>
                <x-form.input name="postal_code" placeholder="11720" type="text" label="Postal Code" value="{{ $user->postal_code }}"/>
            </div>
            <x-form.button> Update </x-form.button>
        </form>
    </x-body>
</x-layout>