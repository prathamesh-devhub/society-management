@extends('layouts.app')
@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Vehicles Management
        </h1>

        <p class="text-gray-500">
            Manage and track society vehicles
        </p>
    </div>

    <a href="{{ route('vehicles.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Add Vehicle
    </a>
</div>

<div class="bg-gray-50 border rounded-lg p-4 mb-6">
    <div class="grid grid-cols-4 gap-4">
    <form action="{{route('vehicles.index')}}" method="get">
        <input type="text" name="search" placeholder="Search by vehicle number or type" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    </div>
</div>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">Member</th>
                    <th class="py-2 px-4 border-b">Vehicle Number</th>
                    <th class="py-2 px-4 border-b">Vehicle Type</th>
                    <th class="py-2 px-4 border-b">Vehicle Brand</th>
                    <th class="py-2 px-4 border-b">Vehicle Color</th>
                    <th class="py-2 px-4 border-b">Parking Slot</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $vehicle->member->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $vehicle->vehicle_number }}</td>
                        <td class="py-2 px-4 border-b">{{ $vehicle->vehicle_type }}</td>
                        <td class="py-2 px-4 border-b">{{ $vehicle->vehicle_brand }}</td>
                        <td class="py-2 px-4 border-b">{{ $vehicle->vehicle_color }}</td>
                        <td class="py-2 px-4 border-b">{{ $vehicle->parking_slot }}</td>
                        <td class="px-4 py-2 border border-gray-200">
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection