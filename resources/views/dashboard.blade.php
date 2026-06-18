@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard
    </h1>

```
<p class="text-gray-500 mt-1">
    Welcome to your Society Management System
</p>
```

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
        <h3 class="text-gray-500 text-sm">Members</h3>
        <p class="text-3xl font-bold">{{ $members }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
        <h3 class="text-gray-500 text-sm">Tenants</h3>
        <p class="text-3xl font-bold">{{ $tenants }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-indigo-500">
        <h3 class="text-gray-500 text-sm">Vehicles</h3>
        <p class="text-3xl font-bold">{{ $vehicles }}</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
        <h3 class="text-gray-500 text-sm">Open Complaints</h3>
        <p class="text-3xl font-bold">{{ $open_complaints }}</p>
    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-600">
        <h3 class="text-gray-500 text-sm">
            Current Month Billing
        </h3>

        <p class="text-2xl font-bold text-blue-600">
            ₹ {{ number_format($currentMonthBilling,2) }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-600">
        <h3 class="text-gray-500 text-sm">
            Collection
        </h3>

        <p class="text-2xl font-bold text-green-600">
            ₹ {{ number_format($currentMonthCollection,2) }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-orange-500">
        <h3 class="text-gray-500 text-sm">
            Expenses
        </h3>

        <p class="text-2xl font-bold text-orange-500">
            ₹ {{ number_format($currentMonthExpenses,2) }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-600">
        <h3 class="text-gray-500 text-sm">
            Outstanding
        </h3>

        <p class="text-2xl font-bold text-red-600">
            ₹ {{ number_format($totalOutstanding,2) }}
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">

        <h3 class="text-gray-500 text-sm">
            Collection Efficiency
        </h3>

        <p class="text-3xl font-bold text-green-600 mt-2">
            {{ $collectionPercentage }}%
        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">

        <h3 class="text-gray-500 text-sm">
            Net Position
        </h3>

        <p class="text-3xl font-bold
            {{ $netPosition >= 0 ? 'text-green-600' : 'text-red-600' }}
            mt-2">

            ₹ {{ number_format($netPosition,2) }}

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">

        <h3 class="text-gray-500 text-sm">
            Resolved Complaints
        </h3>

        <p class="text-3xl font-bold text-purple-500 mt-2">
            {{ $closed_complaints }}
        </p>

    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold mb-4">
            Quick Actions
        </h2>

        <div class="grid grid-cols-2 gap-3">

            <a href="{{ route('members.create') }}"
                class="bg-blue-600 text-white py-3 rounded-lg text-center hover:bg-blue-700">
                Add Member
            </a>

            <a href="{{ route('complaints.create') }}"
                class="bg-red-600 text-white py-3 rounded-lg text-center hover:bg-red-700">
                Add Complaint
            </a>

            <a href="{{ route('maintenance-bills.generate') }}"
                class="bg-green-600 text-white py-3 rounded-lg text-center hover:bg-green-700">
                Generate Bills
            </a>

            <a href="{{ route('expenses.create') }}"
                class="bg-orange-500 text-white py-3 rounded-lg text-center hover:bg-orange-600">
                Add Expense
            </a>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold mb-4">
            Recent Notices
        </h2>

        @forelse($notices as $notice)

            <div class="border-b py-3">

                <div class="font-medium">
                    {{ $notice->title }}
                </div>

                <div class="text-sm text-gray-500">
                    {{ $notice->category }}
                </div>

            </div>

        @empty

            <p class="text-gray-500">
                No active notices.
            </p>

        @endforelse

    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold mb-4">
            Defaulters
        </h2>

        <div class="text-center">

            <p class="text-5xl font-bold text-red-600">
                {{ $defaultersCount }}
            </p>

            <p class="text-gray-500 mt-2">
                Members with outstanding dues
            </p>

        </div>

</div>

<div class="bg-white rounded-xl shadow p-6">

    <h2 class="text-lg font-semibold mb-4">
        Recent Payments
    </h2>

    <table class="w-full">

        <thead>
            <tr>
                <th class="text-left">Member</th>
                <th class="text-left">Amount</th>
            </tr>
        </thead>

        <tbody>

            @foreach($recentPayments as $payment)

                <tr class="border-t">

                    <td>
                        {{ $payment->maintenanceBill->member->name }}
                    </td>

                    <td>
                        ₹ {{ number_format($payment->amount,2) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>
    

</div>

<div class="bg-white rounded-xl shadow p-6 mt-6">

    <h2 class="text-lg font-semibold mb-4">
        Recent Complaints
    </h2>

    <table class="w-full">

        <thead>
            <tr>
                <th class="text-left">Title</th>
                <th class="text-left">Status</th>
                <th class="text-left">Date</th>
            </tr>
        </thead>

        <tbody>

            @foreach($recentComplaints as $complaint)

                <tr class="border-t">

                    <td>
                        {{ $complaint->title }}
                    </td>

                    <td>
                        {{ $complaint->status }}
                    </td>

                    <td>
                        {{ $complaint->created_at->format('d-M-Y') }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>
@endsection
