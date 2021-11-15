<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto justify-end">
            <x-list.button color="green">
                <a href="{{ route('user') }}" class="">Profile</a>
            </x-list.button>
        </div>

        <x-list.heading>Dashboard</x-list.heading>

        @if ($message = Session::get('message'))
            <div class="m-auto font-bold p-2">
                <p class="text-center text-2xl font-bold">{{ $message }}</p>
            </div>
        @endif
    </x-body>
</x-layout>