@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Create Vehicle
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new vehicle and manage its details.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Member -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Member
                    </label>

                    <select
                        name="member_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">Select Member</option>
                        @foreach($members as $member)
                            <option
                                value="{{ $member->id }}"
                                {{ old('member_id', request('member_id')) == $member->id ? 'selected' : '' }}
                            >
                                {{ $member->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <!-- Vehicle Number -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Vehicle Number
                    </label>

                    <input
                        type="text"
                        name="vehicle_number"
                        value="{{ old('vehicle_number') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
                <!-- Vehicle Type -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Vehicle Type
                        </label>

                        <input
                            type="text"
                            name="vehicle_type"
                            value="{{ old('vehicle_type') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                    </div>
            <!-- Vehicle Brand -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Vehicle Brand
                        </label>

                        <input
                            type="text"
                            name="vehicle_brand"
                            value="{{ old('vehicle_brand') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                    </div>
            <!-- Vehicle Color -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Vehicle Color
                        </label>

                        <input
                            type="text"
                            name="vehicle_color"
                            value="{{ old('vehicle_color') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                    </div>
            <!-- Parking Slot -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Parking Slot
                        </label>

                        <input
                            type="text"
                            name="parking_slot"
                            value="{{ old('parking_slot') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        >
                    </div>
            <!-- Ownership document -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Ownership Document
                    </label>

                    <input
                        type="file"
                        name="ownership_document"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Create Vehicle

                </button>

                <a
                    href="{{ route('vehicles.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
            </div>  
        </form>
    </div>
    </div>  
@endsection