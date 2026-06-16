@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Expense Management
        </h1>

        <p class="text-gray-500">
            Manage and track society expenses
        </p>
    </div>

    <a href="{{ route('expenses.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Expense
    </a>
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('expenses.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by expense title or description" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">Expense Date</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Payment Mode</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                @foreach($expenses as $expense)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $expense->expense_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $expense->category }}</td>
                        
                        <td class="py-2 px-4 border-b">{{ $expense->amount }}</td>
                        <td class="py-2 px-4 border-b">{{ $expense->payment_mode }}</td>
                        <td class="py-2 px-4 border-b">
                            @if($expense->status == 'Pending')
                                <span class="bg-red-500 text-white py-1 px-2 rounded">Pending</span>
                            @else
                                <span class="bg-green-500 text-white py-1 px-2 rounded">Paid</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-200">
                            <div class="flex gap-2">

                                <a href="{{ route('expenses.show', $expense->id) }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded text-sm text-center">
                                    View
                                </a>

                                <a href="{{ route('expenses.edit', $expense->id) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-sm text-center">
                                    Edit
                                </a>

                                <form action="{{ route('expenses.destroy', $expense->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded text-sm"
                                        onclick="return confirm('Are you sure you want to delete this expense?')">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection