@props(['user_first_name', 'user_last_name'])
<div class="flex flex-wrap flex-lg-columns justify-around">
    <div>
        {{-- <p>{{ $user->first_name}} {{ $user->last_name }}</p>
        <p>{{ $user->company_name }}</p>
        <p>{{ $user->company_number }}</p> --}}
        <p>{{ $user_first_name }}</p>
        <p>{{ $user_last_name }}</p>

    </div>
</div>


<table class="invoice_table table w-full">
    <thead>
        <tr class="border-b border-black-100">
            <th>Product Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <x-invoice_form.input type="text" name="item_name" class="item_name"/>
                <input type="text" name="item_name" class="item_name">
            </td>
            <td>
                <input type="number" name="item_price" class="item_price"> 
            </td>
            <td>
                <input type="number" name="item_qty" class="item_qty">
            </td>
            <td class="table-total">
                 <span class="table-text">{{product.qty * item.price}}</span>
            </td>
            <td class="table-remove">
                 <span @click="remove(item)" class="table-remove-btn">&times;</span>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td class="" colspan="2">
                <span @click="addLine" class="table-add_line">Add Line</span>
            </td>
            <td>Grand Total</td>
            <td>
                @{{grandTotal}}
                <input type="number" name="item_grand_total" class="item_grand_total">
            </td>
        </tr>
    </tfoot> 
</table> 