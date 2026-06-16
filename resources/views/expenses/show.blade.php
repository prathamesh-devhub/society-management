@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Expense Details</h1>

        <a href="{{ route('expenses.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Back
        </a>
    </div>

    <!-- Expense Card -->
    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <div class="flex items-center gap-6">

            <div class="grid grid-cols-2 gap-x-10 gap-y-3">
                <div>
                    <span class="font-semibold">Expense Date:</span>
                    {{ $expense->expense_date }}
                </div>

                <div>
                    <span class="font-semibold">Category:</span>
                    {{ $expense->category }}
                </div>

                <div>
                    <span class="font-semibold">Vendor Name:</span>
                    {{ $expense->vendor_name }}
                </div>

                <div>
                    <span class="font-semibold">Amount:</span>
                    {{ $expense->amount }}
                </div>

                <div>
                    <span class="font-semibold">Payment Mode:</span>
                    {{ $expense->payment_mode }}
                </div>

                <div>
                    <span class="font-semibold">Status:</span>
                    @if($expense->status == 'Paid')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                            Paid
                        </span>
                    @else($expense->status == 'Pending')
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                            Pending
                        </span>
                    @endif
                </div>

                <div>
                    <span class="font-semibold">Remarks:</span>
                    {{ $expense->remarks }}
                </div>
                
            </div>

        </div>
    </div>

</div>
@endsection