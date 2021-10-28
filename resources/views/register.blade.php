<x-layout>

    <div class="flex justify-center">
        <div class="bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1 class="text-center mb-4">Please register</h1>

                <x-form.input name="email" placeholder="example@mail.com" type="email" label="Email"/>
                <x-form.input name="first_name" placeholder="John" type="text" label="First Name"/>
                <x-form.input name="last_name" placeholder="Doe"  type="text" label="Last Name"/>
                <x-form.input name="password" placeholder="yourpassword" type="password" label="Password"/>
                <x-form.input name="password_confirmation" placeholder="yourpassword" type="password" label="Repeat Password"/>
        
                <div class="m-3">
                    <input type="checkbox" name="terms"> I agree to the Terms & Conditions
                    <x-form.error name="terms" /> 
                </div>
               
                <x-form.button> Register </x-form.button>

                <div class="mb-4 text-right">Already a member? <a class="text-green-400 hover:text-green-300" href="/login">Log in!</a></div>

            </form>
        </div>
    </div>
</x-layout>