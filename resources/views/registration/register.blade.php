<x-layout>

    <div class="flex justify-center">
       
        <div class="w-3.5/12 bg-white p-6 rounded-lg">
            <h1 class="text-center mb-4">Please register</h1>

            <form action="{{ route('register') }}" method="POST">
                <x-form.input_register name="email" placeholder="example@mail.com" label="Email"/>
                <x-form.input_register name="first_name" placeholder="John" label="First Name"/>
                <x-form.input_register name="last_name" placeholder="Doe" label="Last Name"/>
                <x-form.input_register name="password" type="password" placeholder="yourpassword" label="Password"/>
                <x-form.input_register name="password_confirmation" type="password" placeholder="yourpassword" label="Repeat Password"/>
        
                <div class="mb-4">
                    <input type="checkbox"> I agree to the Terms & Conditions

                </div>
               
               <x-form.button />

                <div class="mb-4 text-right">Already a member? <a class="text-green-400 hover:text-green-300" href="">Log in!</a></div>

            </form>
        </div>
    </div>


</x-layout>