@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Member Details</h1>

        <a href="{{ route('members.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Back
        </a>
    </div>

    <!-- Member Card -->
    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <div class="flex items-center gap-6">

            <div>
                @if($member->profile_photo)
                    <img
                        src="{{ asset('storage/' . $member->profile_photo) }}"
                        class="w-32 h-32 rounded-full object-cover border"
                        alt="Profile Photo">
                @else
                    <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center">
                        No Photo
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-x-10 gap-y-3">
                <div>
                    <span class="font-semibold">Name:</span>
                    {{ $member->name }}
                </div>

                <div>
                    <span class="font-semibold">Email:</span>
                    {{ $member->email }}
                </div>

                <div>
                    <span class="font-semibold">Phone:</span>
                    {{ $member->phone }}
                </div>

                <div>
                    <span class="font-semibold">Wing:</span>
                    {{ $member->wing }}
                </div>

                <div>
                    <span class="font-semibold">Flat Number:</span>
                    {{ $member->flat_number }}
                </div>
            </div>

        </div>
    </div>

    <!-- Vehicles Section -->
    <div class="bg-white shadow rounded-xl p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">
                Vehicles ({{ $member->vehicles->count() }})
            </h2>

            <a href="{{ route('vehicles.create', ['member_id' => $member->id]) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Add Vehicle
            </a>
        </div>

        @if($member->vehicles->isEmpty())
            <div class="text-gray-500 text-center py-6">
                No vehicles registered.
            </div>
        @else

            <table class="min-w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Vehicle Number</th>
                        <th class="p-3 text-left">Type</th>
                        <th class="p-3 text-left">Brand</th>
                        <th class="p-3 text-left">Color</th>
                        <th class="p-3 text-left">Parking Slot</th>
                        <th class="p-3 text-left">Ownership Document</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($member->vehicles as $vehicle)
                        <tr class="border-t">
                            <td class="p-3">{{ $vehicle->vehicle_number }}</td>
                            <td class="p-3">{{ $vehicle->vehicle_type }}</td>
                            <td class="p-3">{{ $vehicle->vehicle_brand }}</td>
                            <td class="p-3">{{ $vehicle->vehicle_color }}</td>
                            <td class="p-3">{{ $vehicle->parking_slot }}</td>
                            <td class="p-3">
                                @if($vehicle->ownership_document)
                                    <a href="{{ asset('storage/' . $vehicle->ownership_document) }}" target="_blank" class="text-blue-500 hover:underline">
                                        View Document
                                    </a>
                                @else
                                    <span class="text-gray-500">No Document</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    </div>
</br>
    <!-- Tenants Section -->
    <div class="bg-white shadow rounded-xl p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">
                Tenants ({{ $member->tenants->count() }})
            </h2>

            <a href="{{ route('tenants.create', ['member_id' => $member->id]) }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Add Tenant
            </a>
        </div>

        @if($member->tenants->isEmpty())
            <div class="text-gray-500 text-center py-6">
                No tenants registered.
            </div>
        @else

            <table class="min-w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Tenant Name</th>
                        <th class="p-3 text-left">Phone</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Agreement</th>
                        <th class="p-3 text-left">Active</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($member->tenants as $tenant)
                        <tr class="border-t">
                            <td class="p-3">
                                <a href="{{ route('tenants.show',$tenant) }}"
                                class="text-blue-600 hover:underline">
                                    {{ $tenant->name }}
                                </a>
                            </td>
                            <td class="p-3">{{ $tenant->phone }}</td>
                            <td class="p-3">{{ $tenant->email }}</td>
                            <td class="p-3">
                                {{ $tenant->agreement_start }}
                                <br>
                                {{ $tenant->agreement_end }}
                            </td>
                            <td class="p-3">
                            @if($tenant->is_active)
                                <span class="text-green-600 font-semibold">Active</span>
                            @else
                                <span class="text-red-600 font-semibold">Inactive</span>
                            @endif
                            </td>        
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif

    </div>

</div>
@endsection