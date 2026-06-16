@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Add New Payment
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new payment to the bill.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{route('maintenance-payments.store',$maintenanceBill)}}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Payment Date -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Payment Date
                    </label>

                    <input
                        type="date"
                        name="payment_date"
                        value="{{ old('payment_date') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Amount -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Amount
                    </label>

                    <input
                        type="text"
                        name="amount"
                        value="{{ old('amount',$maintenanceBill->balance) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Payment Mode -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Payment Mode
                    </label>

                    <select
                        name="payment_mode"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        <option value="cash" {{ old('payment_mode') == 'cash' ? 'selected' : '' }}>
                            Cash
                        </option>

                        <option value="upi" {{ old('payment_mode') == 'upi' ? 'selected' : '' }}>
                            UPI
                        </option>

                        <option value="cheque" {{ old('payment_mode') == 'cheque' ? 'selected' : '' }}>
                            Cheque
                        </option>

                        <option value="bank-transfer" {{ old('payment_mode') == 'bank-transfer' ? 'selected' : '' }}>
                            Bank Transfer
                        </option>
                    </select>
                </div>

                <!-- Reference No -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Reference No
                    </label>

                    <input
                        type="text"
                        name="reference_no"
                        value="{{ old('reference_no') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Remarks -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Remarks
                    </label>

                    <textarea
                        name="remarks"
                        rows="6"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('remarks') }}</textarea>
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Add Payment

                </button>

                <a
                    href="{{ route('maintenance-bills.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
</div>
@endsection