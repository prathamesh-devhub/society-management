@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded-xl p-6">

    <h1 class="text-2xl font-bold text-center">
        {{ $settings->society_name }}
    </h1>

    <h2 class="text-center text-gray-600">
        Maintenance Bill
    </h2>

</div>

<div class="bg-white shadow rounded-xl p-6 mt-4">

    <h3 class="font-semibold mb-4">
        Member Details
    </h3>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <strong>Member:</strong>
            {{ $maintenanceBill->member->name }}
        </div>

        <div>
            <strong>Flat:</strong>
            {{ $maintenanceBill->member->wing }}
            -
            {{ $maintenanceBill->member->flat_number }}
        </div>

        <div>
            <strong>Area:</strong>
            {{ $maintenanceBill->square_feet }}
        </div>

        <div>
            <strong>Status:</strong>
            {{ $maintenanceBill->status }}
        </div>

    </div>

</div>

<div class="bg-white shadow rounded-xl p-6 mt-4">
    <table class="min-w-full border">

        <thead>
            <tr>
                <th>Particulars</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Repair & Maintenance</td>
                <td>{{ number_format($maintenanceBill->repair_amount,2) }}</td>
            </tr>

            <tr>
                <td>Sinking Fund</td>
                <td>{{ number_format($maintenanceBill->sinking_amount,2) }}</td>
            </tr>

            <tr>
                <td>Building Fund</td>
                <td>{{ number_format($maintenanceBill->building_amount,2) }}</td>
            </tr>

            <tr>
                <td>Electricity Charges</td>
                <td>{{ number_format($maintenanceBill->electricity_charge,2) }}</td>
            </tr>

            <tr>
                <td>Water Charges</td>
                <td>{{ number_format($maintenanceBill->water_charge,2) }}</td>
            </tr>

            <tr>
                <td>Service Charges</td>
                <td>{{ number_format($maintenanceBill->service_charge,2) }}</td>
            </tr>

            <tr>
                <td>Lift Maintenance</td>
                <td>{{ number_format($maintenanceBill->lift_charge,2) }}</td>
            </tr>

            <tr>
                <td>Building Insurance</td>
                <td>{{ number_format($maintenanceBill->insurance_charge,2) }}</td>
            </tr>

            <tr>
                <td>Education Fund</td>
                <td>{{ number_format($maintenanceBill->education_charge,2) }}</td>
            </tr>

        </tbody>

    </table>
</div>    

<div class="bg-white shadow rounded-xl p-6 mt-4">

    <div class="flex justify-between">
        <span>Current Bill Total</span>
        <span>{{ $maintenanceBill->current_bill_total }}</span>
    </div>

    <div class="flex justify-between">
        <span>Previous Due</span>
        <span>{{ $maintenanceBill->previous_due }}</span>
    </div>

    <div class="flex justify-between">
        <span>Interest</span>
        <span>{{ $maintenanceBill->interest_amount }}</span>
    </div>

    <div class="flex justify-between font-bold text-lg border-t pt-3 mt-3">
        <span>Grand Total</span>
        <span>{{ $maintenanceBill->grand_total }}</span>
    </div>

</div>

<div class="bg-white shadow rounded-xl p-6 mt-4">

    <h3 class="font-semibold mb-4">
        Payments
    </h3>

    <table class="min-w-full border">

        <thead>
            <tr>
                <th>Receipt No.</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Reference</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>

        @forelse($maintenanceBill->payments as $payment)

            <tr>
                <td>{{ $payment->receipt_no }}</td>
                <td>{{ $payment->payment_date }}</td>
                <td>{{ $payment->payment_mode }}</td>
                <td>{{ $payment->reference_no }}</td>
                <td>{{ $payment->amount }}</td>
            </tr>

        @empty

            <tr>
                <td colspan="4">
                    No Payments Recorded
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="mt-4">

        <div>
            Total Paid :
            ₹{{ number_format($maintenanceBill->total_paid,2) }}
        </div>

        <div>
            Balance :
            ₹{{ number_format($maintenanceBill->balance,2) }}
        </div>
        <div>
            Advance:
            ₹{{ number_format($maintenanceBill->advance,2) }}
        </div>
    </div>
    
</div>
</br>
    <div>
        <a href="{{ route('maintenance-bills.billpdf',$maintenanceBill) }}"
        target="_blank"
        class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
            🖨 Print Bill
        </a>

        <a href="{{ route('maintenance-bills.email',$maintenanceBill) }}"
        class="bg-green-600 text-white px-4 py-2 ml-4 rounded-lg">
            ✉ Email Bill
        </a>
    </div>
@endsection