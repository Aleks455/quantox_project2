<x-layout>

    <div class="flex justify-center">
       
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="/login" method="POST">
                @csrf

                <h1 class="text-center mb-4">Login please</h1>

                <x-form.input name="email" placeholder="example@mail.com" type="email" label="Email"/>
                <x-form.input name="password" placeholder="yourpassword" type="password" label="Password"/>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2"> 
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <x-form.button>Log in</x-form.button>
            </form>
        </div>
    </div>


</x-layout>