@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Add New Expense
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new expense.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{route('expenses.store')}}" method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Expense Date -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Expense Date
                    </label>

                    <input
                        type="date"
                        name="expense_date"
                        value="{{ old('expense_date') }}"
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

                        <option value="security" {{ old('category') == 'security' ? 'selected' : '' }}>
                            Security
                        </option>

                        <option value="electricity" {{ old('category') == 'electricity' ? 'selected' : '' }}>
                            Electricity
                        </option>

                        <option value="water" {{ old('category') == 'water' ? 'selected' : '' }}>
                            Water
                        </option>

                        <option value="lift" {{ old('category') == 'lift' ? 'selected' : '' }}>
                            Lift
                        </option>

                        <option value="housekeeping" {{ old('category') == 'housekeeping' ? 'selected' : '' }}>
                            Housekeeping
                        </option>

                        <option value="repairs" {{ old('category') == 'repairs' ? 'selected' : '' }}>
                            Repairs
                        </option>

                        <option value="audit" {{ old('category') == 'audit' ? 'selected' : '' }}>
                            Audit
                        </option>

                        <option value="miscellaneous" {{ old('category') == 'miscellaneous' ? 'selected' : '' }}>
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
                        value="{{ old('vendor_name') }}"
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
                        value="{{ old('amount') }}"
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

                        <option value="Paid" {{ old('status') == 'Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                        <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
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
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('remarks') }}</textarea>
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Add Expense

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