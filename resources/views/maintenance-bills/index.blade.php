@extends('layouts.app')
@section('content')

    <div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Maintenance Bill Management
        </h1>

        <p class="text-gray-500">
            Manage and track maintenance bills
        </p>
    </div>
        
    <a href="{{ route('maintenance-bills.generate') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Generate Bills
        </a>
    
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('maintenance-bills.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by name, email, wing, or flat number" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
<div class="overflow-x-auto">    
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border border-gray-200">Bill No </th>
            <th class="px-4 py-2 border border-gray-200">Month </th>
            <th class="px-4 py-2 border border-gray-200">Year</th>
            <th class="px-4 py-2 border border-gray-200">Member Name</th>
            <th class="px-4 py-2 border border-gray-200">Grand Total</th>
            <th class="px-4 py-2 border border-gray-200">Paid</th>
            <th class="px-4 py-2 border border-gray-200">Balance</th>
            <th class="px-4 py-2 border border-gray-200">Status</th>
            <th class="px-4 py-2 border border-gray-200">Actions</th>
        </tr>
        @foreach($bills as $maintenance)
        <tr>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->bill_no }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->bill_month_name }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->bill_year }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->member->name }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->grand_total }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->total_paid }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->balance }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $maintenance->status }}</td>
            <td class="px-4 py-3">
            <div class="flex gap-2">

                <a href="{{ route('maintenance-bills.show', $maintenance) }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow-sm text-sm">
                    View Bill
                </a>
                @if($maintenance->balance > 0)
                    <a href="{{ route('maintenance-payments.create', $maintenance) }}" 
                    class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg shadow-sm text-sm">
                        Record Payment
                    </a>
                @endif
            </div>
        </td>
        </tr>
        @endforeach
    </table>
</div>    
    {{ $bills->links() }}
@endsection