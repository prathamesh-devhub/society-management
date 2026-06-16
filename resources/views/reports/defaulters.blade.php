@extends('layouts.app')
@section('content')
<table class="min-w-full border">
    <thead>
        <tr>
            <th>Flat</th>
            <th>Member</th>
            <th>Bill Month</th>
            <th>Grand Total</th>
            <th>Paid</th>
            <th>Balance</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bills as $bill)
            <tr>
                <td>
                    {{ $bill->member->wing }}
                    {{ $bill->member->flat_number }}
                </td>

                <td>
                    {{ $bill->member->name }}
                </td>

                <td>
                    {{ $bill->bill_month_name }}
                    {{ $bill->bill_year }}
                </td>

                <td>
                    ₹{{ number_format($bill->grand_total,2) }}
                </td>

                <td>
                    ₹{{ number_format($bill->total_paid,2) }}
                </td>

                <td class="text-red-600 font-bold">
                    ₹{{ number_format($bill->balance,2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection