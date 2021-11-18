<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-end">
            <x-list.button color="green">
                <a href="{{ route('user.edit') }}" class="">Update</a>
            </x-list.button>
        </div>

        <x-list.heading>Profile Information</x-list.heading>

        <div>
            <x-list.item label='First Name'>{{$user->first_name ? $user->first_name : '/'}}</x-list.item>
            <x-list.item label='Last Name'>{{ $user->last_name ? $user->last_name : '/' }}</x-list.item>
            <x-list.item label='Email'>{{ $user->email ? $user->email : '/' }}</x-list.item>
            <x-list.item label='Company Name'>{{ $user->company_name ?  $user->company_name : '/'}} </x-list.item>
            <x-list.item label='Vat ID'>{{ $user->vat_id ? $user->vat_id  : '/'}} </x-list.item>
            <x-list.item label='Company number'>{{ $user->company_number ? $user->company_number : '/' }}</x-list.item>
            <x-list.item label='Bank account'>{{ $user->bank_account ? $user->bank_account  : '/'}}</x-list.item>
            <x-list.item label='Company Address'>{{ $user->company_address ? $user->company_address  : '/'}}</x-list.item>
            <x-list.item label='Phone number'>{{ $user->phone_number ? $user->phone_number  : '/'}}</x-list.item>
            <x-list.item label='City'>{{ $user->city ? $user->city  : '/' }}</x-list.item>
            <x-list.item label='Post code'>{{ $user->postal_code ? $user->postal_code : '/' }}</x-list.item>
            <x-list.item label='Country'>{{ $user->state ? $user->state  : '/'}}</x-list.item>
        </div>
    </x-body>
</x-layout>