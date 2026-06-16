@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Complaints Management
        </h1>

        <p class="text-gray-500">
            Manage and track society complaints
        </p>
    </div>

    <a href="{{ route('complaints.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Complaint
    </a>
</div>
    
<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('complaints.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by title, description, or status" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <form action="{{route('complaints.index')}}" method="get">
        <label for="status">Filter by Status:</label>
        <select name="status">
            <option value="">All</option>
            <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
            <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
            <label for="priority">Filter by Priority:</label>
        <select name="priority">
            <option value="">All</option>
            <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
            <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
        </select>
        <button type="submit">Filter</button>
    </form>
    </div>
</div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border border-gray-200">ID </th>
            <th class="px-4 py-2 border border-gray-200">Member Name</th>
            <th class="px-4 py-2 border border-gray-200">Title</th>
            <th class="px-4 py-2 border border-gray-200">Description</th>
            <th class="px-4 py-2 border border-gray-200">Status</th>
            <th class="px-4 py-2 border border-gray-200">Priority</th>
            <th class="px-4 py-2 border border-gray-200">Actions</th>
        </tr>
        @foreach($complaints as $complaint)
        <tr>
            <td class="px-4 py-2 border border-gray-200">{{ $complaint->id }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $complaint->member->name }}</td>
            <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('complaints.show', $complaint->id) }}" class="text-blue-500 hover:text-blue-700">
                    {{ $complaint->title }}
                </a>
            </td>
            <td class="px-4 py-2 border border-gray-200">{{ $complaint->description }}</td>
            <td>
                @if($complaint->status == 'open')
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                        Open
                    </span>
                @elseif($complaint->status == 'in_progress')
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                        In Progress
                    </span>
                @else
                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                        Resolved
                    </span>
                @endif
            </td>
            <td>
                @if($complaint->priority == 'low')
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                        Low
                    </span>
                @elseif($complaint->priority == 'medium')
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs">
                        Medium
                    </span>
                @else
                    <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                        High
                    </span>
                @endif
            </td>
            <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('complaints.edit', $complaint->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                <form action="{{ route('complaints.destroy', $complaint->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this complaint?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {{ $complaints->links() }}
@endsection    