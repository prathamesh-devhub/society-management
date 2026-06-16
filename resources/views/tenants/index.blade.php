@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Tenants Management
        </h1>

        <p class="text-gray-500">
            Manage and track society tenants
        </p>
    </div>

    <a href="{{ route('tenants.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Tenant
    </a>
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('tenants.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by name, flatnumber or wing" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">Tenant</th>
                    <th class="py-2 px-4 border-b">Owner Name</th>
                    <th class="py-2 px-4 border-b">Flat Number</th>
                    <th class="py-2 px-4 border-b">Agreement Start</th>
                    <th class="py-2 px-4 border-b">Agreement End</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                @foreach($tenants as $tenant)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $tenant->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->member->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->member->flat_number }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->agreement_start }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->agreement_end }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->phone }}</td>
                        <td class="px-4 py-2 border border-gray-200">
                            <a href="{{ route('tenants.edit', $tenant->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this tenant?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection