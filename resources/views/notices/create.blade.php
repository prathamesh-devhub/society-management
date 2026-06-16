@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Create Notice
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new notice and manage its details.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

            <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        value="{{ old('description') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >{{ old('description') }}</textarea>
                </div>    


            <!-- Category -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Category
                    </label>

                    <select name="category">
                        <option value="General">General</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Water">Water</option>
                        <option value="Parking">Parking</option>
                        <option value="Festival">Festival</option>
                        <option value="Emergency">Emergency</option>
                        <option value="Finance">Finance</option>
                        <option value="Meeting">Meeting</option>
                    </select>
                </div>

            <!-- Created By -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Created By
                    </label>

                    <select
                        name="created_by"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}"
                                {{ old('created_by', request('created_by')) == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <!-- Publish Date -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Publish Date
                    </label>

                    <input
                        type="date"
                        name="publish_date"
                        value="{{ date('Y-m-d') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

            <!-- Expiry Date -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Expiry Date
                    </label>

                    <input
                        type="date"
                        name="expiry_date"
                        value="{{ old('expiry_date') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

            <!-- Active -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Active
                        </label>

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active') ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        >
                    </div>

            <!-- Attach Document -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Attachment (optional)
                    </label>

                    <input
                        type="file"
                        name="attachment"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Create Notice

                </button>

                <a
                    href="{{ route('notices.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
            </div>  
        </form>
    </div>
    </div>  
@endsection