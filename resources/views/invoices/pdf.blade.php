<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Invoice no.{{ $invoice->id }} / 2021</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }
            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }
            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }
            strong {
                font-weight: bolder;
            }
            img {
                vertical-align: middle;
                border-style: none;
            }
            table {
                border-collapse: collapse;
            }
            th {
                text-align: inherit;
            }
            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }
            h4, .h4 {
                font-size: 1.5rem;
            }
            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }
            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }
            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }
            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }
            .mt-5 {
                margin-top: 3rem !important;
            }
            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }
            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }
            .text-right {
                text-align: right !important;
            }
            .text-center {
                text-align: center !important;
            }
            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
        </style>
    </head>

    <body>
        {{-- Header --}}
        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        
                    </td>
                    <td class="border-0 pl-0">
                        <p><strong>Invoice no: {{ $invoice->id }} / 2021</strong></p>
                        <p> <strong>Invoice date: {{ $invoice->date }}</strong></p>
                        <p> <strong>Invoice due date: {{ $invoice->due_date }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- From - To --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%">
                        From
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header">
                        To

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        @if ($invoice->user->company_name ) 
                            <p>Company: <strong>{{ $invoice->user->company_name }}</strong>
                            </p>
                        @endif

                        @if ($invoice->user->company_address)
                            <p>Address: {{ $invoice->user->company_address }}</p>
                        @endif

                        @if($invoice->user->vat_id)
                            <p>Vat ID: {{ $invoice->user->vat_id }}</p>
                        @endif

                        @if($invoice->user->phone_number)
                            <p>Phone: {{ $invoice->user->phone_number }}</p>
                        @endif
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        @if($invoice->client->name)
                            <p>Client: <strong>{{ $invoice->client->name }}</strong></p>
                        @endif

                        @if($invoice->client->address)
                            <p>Address: {{ $invoice->client->address }}</p>
                        @endif

                        @if($invoice->client->vat_id)
                            <p>VAT ID: {{ $invoice->client->vat_id }}</p>
                        @endif

                        @if($invoice->client->phone_number)
                            <p>Phone: {{ $invoice->client->phone_number }}</p>
                        @endif
                    </td>
                </tr>
            </tbody> 
        </table>

        {{-- Table --}}
        <table class="table table-items">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0">Service</th>
                    <th scope="col" class="text-center border-0">Quantity</th>
                    <th scope="col" class="text-right border-0">Price</th>                 
                    <th scope="col" class="text-right border-0 pr-0">Total</th>
                </tr>
            </thead>
            <tbody>
                {{-- Items --}}
                @foreach($invoice->items as $item)
                <tr>
                    <td class="pl-0">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">${{ $item->price }}</td>
                    <td class="text-right pr-0">${{ $item->total }}</td>
                </tr>
                @endforeach
                {{-- Summary --}}
                    <tr>
                        <td colspan="2" class="border-0"></td>
                        <td class="text-right pl-0">Grand total</td>
                        <td class="text-right pr-0 total-amount">
                            ${{ $invoice->grand_total }}
                        </td>
                    </tr> 
            </tbody>
        </table>
        <p>Total amount is: ${{ $invoice->grand_total }}</p>
        <p>Please pay until: {{ $invoice->due_date }}</p>
    </body>
</html>