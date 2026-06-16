@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Member
        </h1>

        <p class="text-gray-500 mt-1">
            Update member information and track its progress.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{route('members.update', $member->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $member->name) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $member->email) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Phone -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $member->phone) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Wing -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Wing
                    </label>

                    <input
                        type="text"
                        name="wing"
                        value="{{ old('wing', $member->wing) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Flat Number -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Flat Number
                    </label>

                    <input
                        type="text"
                        name="flat_number"
                        value="{{ old('flat_number', $member->flat_number) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Square Feet -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Square Feet
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="square_feet"
                        value="{{ old('square_feet', $member->square_feet ?? '') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                @if($member->profile_photo)
                    <!-- Profile Photo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Profile Photo
                        </label>
                        <img src="{{ Storage::url($member->profile_photo) }}" alt="Profile Photo" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif

                    <input
                        type="file"
                        name="profile_photo"
                        value ="{{ old('profile_photo', $member->profile_photo) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
            </div>
            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Update Member

                </button>

                <a
                    href="{{ route('members.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
    </div>
</div>
@endsection