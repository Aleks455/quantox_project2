<x-layout>
    <x-body>
        <div class=" border-b-2 flex flex-auto">
            <x-list.button>
                <a href="{{ route('invoices.index') }}" class="">Back</a>
            </x-list.button>
        </div>
        
        <x-list.heading>Edit Invoice</x-list.heading>

        <form action="{{ route('invoices.update') }}" method="POST">
            @csrf
            
            
            <x-form.input name="id" placeholder="" type="hidden" label="" value="{{ $invoice->id }}" />

            <x-invoice_form.form_content />
            <hr>  

           
            <x-form.button> Update </x-form.button>
        </form>
    </x-body>
</x-layout>