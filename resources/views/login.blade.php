<x-layout>

    <div class="flex justify-center">
       
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="/login" method="POST">
                @csrf

                <h1 class="text-center mb-4">Login please</h1>

                <x-form.input_register name="email" placeholder="example@mail.com" type="email" label="Email"/>
                <x-form.input_register name="password" placeholder="yourpassword" type="password" label="Password"/>

                <x-form.button>Log in</x-form.button>
            </form>
        </div>
    </div>


</x-layout>