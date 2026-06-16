@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Expense
        </h1>

        <p class="text-gray-500 mt-1">
            Update expense information and track its progress.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{ route('expenses.update', $expense->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Expense Date -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Expense Date
                    </label>

                    <input
                        type="date"
                        name="expense_date"
                        value="{{ old('expense_date',$expense->expense_date) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Category
                    </label>

                    <select
                        name="category"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        <option value="security" {{ $expense->category == 'security' ? 'selected' : '' }}>
                            Security
                        </option>

                        <option value="electricity" {{ $expense->category == 'electricity' ? 'selected' : '' }}>
                            Electricity
                        </option>

                        <option value="water" {{ $expense->category == 'water' ? 'selected' : '' }}>
                            Water
                        </option>

                        <option value="lift" {{ $expense->category == 'lift' ? 'selected' : '' }}>
                            Lift
                        </option>

                        <option value="housekeeping" {{ $expense->category == 'housekeeping' ? 'selected' : '' }}>
                            Housekeeping
                        </option>

                        <option value="repairs" {{ $expense->category == 'repairs' ? 'selected' : '' }}>
                            Repairs
                        </option>

                        <option value="audit" {{ $expense->category == 'audit' ? 'selected' : '' }}>
                            Audit
                        </option>

                        <option value="miscellaneous" {{ $expense->category == 'miscellaneous' ? 'selected' : '' }}>
                            Miscellaneous
                        </option>
                    </select>
                </div>

                <!-- Vendor Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Vendor Name
                    </label>

                    <input
                        type="text"
                        name="vendor_name"
                        value="{{ old('vendor_name', $expense->vendor_name) }}"
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
                        value="{{ old('amount',$expense->amount) }}"
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

                        <option value="cash" {{ $expense->payment_mode == 'cash' ? 'selected' : '' }}>
                            Cash
                        </option>

                        <option value="upi" {{ $expense->payment_mode == 'upi' ? 'selected' : '' }}>
                            UPI
                        </option>

                        <option value="cheque" {{ $expense->payment_mode == 'cheque' ? 'selected' : '' }}>
                            Cheque
                        </option>

                        <option value="bank-transfer" {{ $expense->payment_mode == 'bank-transfer' ? 'selected' : '' }}>
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
                        value="{{ old('reference_no',$expense->reference_no) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Bill Copy -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Bill Copy
                    </label>

                    <input
                        type="file"
                        name="bill_copy"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        <option value="Paid" {{ $expense->status == 'Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                        <option value="Pending" {{ $expense->status == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>
                    </select>
                </div>

                <!-- Remarks -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Remarks
                    </label>

                    <textarea
                        name="remarks"
                        rows="6"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('remarks', $expense->remarks) }}</textarea>
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Update Expense

                </button>

                <a
                    href="{{ route('expenses.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
</div>
@endsection