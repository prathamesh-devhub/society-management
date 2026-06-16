@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Notice Management
        </h1>

        <p class="text-gray-500">
            Manage and track society notices
        </p>
    </div>

    <a href="{{ route('notices.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Notice
    </a>
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('notices.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by notice title or description" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Publish Date</th>
                    <th class="py-2 px-4 border-b">Expiry Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                @foreach($notices as $notice)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $notice->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $notice->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $notice->category }}</td>
                        
                        <td class="py-2 px-4 border-b">{{ $notice->publish_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $notice->expiry_date }}</td>
                        <td class="py-2 px-4 border-b">
                            @if(!$notice->is_active)
                                <span class="bg-blue-500 text-white py-1 px-2 rounded">Draft</span>
                            @elseif($notice->expiry_date && $notice->expiry_date < today())
                                <span class="bg-red-500 text-white py-1 px-2 rounded">Expired</span>
                            @else
                                <span class="bg-green-500 text-white py-1 px-2 rounded">Active</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border border-gray-200">
                            <a href="{{ route('notices.edit', $notice->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('notices.destroy', $notice->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this notice?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection