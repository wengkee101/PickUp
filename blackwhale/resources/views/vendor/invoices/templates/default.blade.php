<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ public_path('vendor/invoices/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style type="text/css" media="screen">
            * {
                font-family: "DejaVu Sans";
            }
            html {
                margin: 0;
            }
            body {
                font-size: 10px;
                margin: 36pt;
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

            .details{
                table, tr, th, td{
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            }
        </style>
    </head>

    <body>
        {{-- Header --}}
        <div style="text-align:center;">
            @if($invoice->logo)
                <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
            @endif
        </div>
       
        <table class="table mt-5" width="100%">
            <tbody>
                <tr>
                    <td class="border-0 pl-0" width="70%">
                        <h4 class="text-uppercase" style="font-size:20px;">
                            <strong>{{ $invoice->name }}</strong>
                        </h4>
                    </td>
                    <td width="30%">
                        <p>{{ __('invoices::invoice.serial') }} <strong>{{ $invoice->getSerialNumber() }}</strong></p>
                        <p>{{ __('invoices::invoice.date') }}: <strong>{{ $invoice->getDate() }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table" width="100%">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%" style="text-align:left;">
                        {{ __('invoices::invoice.seller') }}
                    </th>
                    <th class="border-0" width="11%"></th>
                    <th class="border-0 pl-0 party-header" style="text-align:left;">
                        {{ __('invoices::invoice.buyer') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0">
                        @if($invoice->seller->name)
                            <p class="seller-name">
                                <strong>{{ $invoice->seller->name }}</strong>
                            </p>
                        @endif

                        @if($invoice->seller->address)
                            <p class="seller-address">
                                {{ __('invoices::invoice.address') }}: <br>{{ $invoice->seller->address }}
                            </p>
                        @endif

                        @if($invoice->seller->code)
                            <p class="seller-code">
                                {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                            </p>
                        @endif

                        @if($invoice->seller->vat)
                            <p class="seller-vat">
                                {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                            </p>
                        @endif

                        @if($invoice->seller->phone)
                            <p class="seller-phone">
                                {{ __('invoices::invoice.phone') }}: {{ str_pad($invoice->seller->phone, 10, "0", STR_PAD_LEFT) }}
                            </p>
                        @endif

                        @foreach($invoice->seller->custom_fields as $key => $value)
                            <p class="seller-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0">
                        @if($invoice->buyer->name)
                            <p class="buyer-name">
                                <strong>{{ $invoice->buyer->name }}</strong>
                            </p>
                        @endif

                        @if($invoice->buyer->address)
                            <p class="buyer-address">
                                {{ __('invoices::invoice.address') }}: {{ $invoice->buyer->address }}
                            </p>
                        @endif

                        @if($invoice->buyer->code)
                            <p class="buyer-code">
                                {{ __('invoices::invoice.code') }}: {{ $invoice->buyer->code }}
                            </p>
                        @endif

                        @if($invoice->buyer->vat)
                            <p class="buyer-vat">
                                {{ __('invoices::invoice.vat') }}: {{ $invoice->buyer->vat }}
                            </p>
                        @endif

                        @if($invoice->buyer->phone)
                            <p class="buyer-phone">
                                {{ __('invoices::invoice.phone') }}: {{ str_pad($invoice->buyer->phone, 10, "0", STR_PAD_LEFT) }}
                            </p>
                        @endif

                        @foreach($invoice->buyer->custom_fields as $key => $value)
                            <p class="buyer-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <div class="party-header" style="font-size:20px;padding-top:15px;">Summary</div>
        <table class="table"  width="100%">
            <thead style="border-bottom: 1px solid gray;border-top: 1px solid gray;">
                <tr>
                    <th style="text-align:left;">{{ __('invoices::invoice.name') }}</th>
                    @if($invoice->hasItemUnits)
                        <th style="text-align:left;">{{ __('invoices::invoice.units') }}</th>
                    @endif
                    <th style="text-align:left;">{{ __('invoices::invoice.quantity') }}</th>
                    <th style="text-align:left;">{{ __('invoices::invoice.price') }}</th>
                    @if($invoice->hasItemDiscount)
                        <th style="text-align:left;">{{ __('invoices::invoice.discount') }}</th>
                    @endif
                    @if($invoice->hasItemTax)
                        <th style="text-align:left;">{{ __('invoices::invoice.tax') }}</th>
                    @endif
                    <th style="text-align:left;">{{ __('invoices::invoice.sub_total') }}</th>
                </tr>
            </thead>
            <tbody  width="100%">
                {{-- Items --}}
                @foreach($invoice->items as $item)
                <tr>
                    <td class="pl-0">{{ $item->title }}</td>
                    @if($invoice->hasItemUnits)
                        <td class="">{{ $item->units }}</td>
                    @endif
                    <td class="text-right" width="10%">{{ $item->quantity }}</td>
                    <td class="text-right" width="20%">
                        {{ $invoice->formatCurrency($item->price_per_unit) }}
                    </td>
                    @if($invoice->hasItemDiscount)
                        <td class="text-right" width="20%">
                            {{ $invoice->formatCurrency($item->discount) }}
                        </td>
                    @endif
                    @if($invoice->hasItemTax)
                        <td class="text-right">
                            {{ $invoice->formatCurrency($item->tax) }}
                        </td>
                    @endif

                    <td class="text-right pr-0" width="10%">
                        {{ $invoice->formatCurrency($item->sub_total_price) }}
                    </td>
                </tr>
                @endforeach
                {{-- Summary --}}
                @if($invoice->hasItemOrInvoiceDiscount())
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.total_discount') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->formatCurrency($invoice->total_discount) }}
                        </td>
                    </tr>
                @endif
                @if($invoice->taxable_amount)
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.taxable_amount') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->formatCurrency($invoice->taxable_amount) }}
                        </td>
                    </tr>
                @endif
                @if($invoice->tax_rate)
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.tax_rate') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->tax_rate }}%
                        </td>
                    </tr>
                @endif
                @if($invoice->hasItemOrInvoiceTax())
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.total_taxes') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->formatCurrency($invoice->total_taxes) }}
                        </td>
                    </tr>
                @endif
                @if($invoice->shipping_amount)
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.shipping') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->formatCurrency($invoice->shipping_amount) }}
                        </td>
                    </tr>
                @endif
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right pl-0"  style="border-bottom: 1px solid gray;border-top: 1px solid gray;">{{ __('invoices::invoice.total_amount') }}</td>
                        <td class="text-right pr-0 total-amount"  style="border-bottom: 1px solid gray;border-top: 1px solid gray;">
                            {{ $invoice->formatCurrency($invoice->total_amount) }}
                        </td>
                    </tr>
            </tbody>
        </table>

        <p>
            {{ trans('invoices::invoice.amount_in_words') }}: {{ $invoice->getTotalAmountInWords() }}
        </p>
        <p>
            {{ trans('invoices::invoice.pay_until') }}: {{ $invoice->getPayUntilDate() }}
        </p>
        

        @if($invoice->notes)
            <p  style="margin-top:25px;">
                {{ trans('invoices::invoice.policy') }}: <br> {!! $invoice->notes !!}
            </p>
        @endif

        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
    </body>
</html>
