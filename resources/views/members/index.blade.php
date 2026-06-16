@extends('layouts.app')
@section('content')

    <div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Members Management
        </h1>

        <p class="text-gray-500">
            Manage and track society members
        </p>
    </div>

    <a href="{{ route('members.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Member
    </a>
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('members.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by name, email, wing, or flat number" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
<div class="overflow-x-auto">    
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border border-gray-200">ID </th>
            <th class="px-4 py-2 border border-gray-200">Name</th>
            <th class="px-4 py-2 border border-gray-200">Email</th>
            <th class="px-4 py-2 border border-gray-200">Phone</th>
            <th class="px-4 py-2 border border-gray-200">Wing</th>
            <th class="px-4 py-2 border border-gray-200">Flat Number</th>
            <th class="px-4 py-2 border border-gray-200">Actions</th>
        </tr>
        @foreach($members as $member)
        <tr>
            <td class="px-4 py-2 border border-gray-200">{{ $member->id }}</td>
            <td class="px-4 py-2 border border-gray-200"><a href="{{ route('members.show', $member->id) }}" class="text-blue-500 hover:text-blue-700">{{ $member->name }}</a></td>
            <td class="px-4 py-2 border border-gray-200">{{ $member->email }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $member->phone }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $member->wing }}</td>
            <td class="px-4 py-2 border border-gray-200">{{ $member->flat_number }}</td>
            <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('members.edit', $member->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                <form action="{{ route('members.destroy', $member->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>    
    {{ $members->links() }}
@endsection