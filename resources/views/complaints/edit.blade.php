@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Complaint
        </h1>

        <p class="text-gray-500 mt-1">
            Update complaint information and track its progress.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">

        <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Title -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Complaint Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $complaint->title) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Member -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Member
                    </label>

                    <select
                        name="member_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        @foreach($members as $member)
                            <option
                                value="{{ $member->id }}"
                                {{ $complaint->member_id == $member->id ? 'selected' : '' }}>
                                {{ $member->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        <option value="open" {{ $complaint->status == 'open' ? 'selected' : '' }}>
                            Open
                        </option>

                        <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>
                            Resolved
                        </option>

                    </select>
                </div>

                <!-- Priority -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Priority
                    </label>

                    <select
                        name="priority"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">

                        <option value="low" {{ $complaint->priority == 'low' ? 'selected' : '' }}>
                            Low
                        </option>

                        <option value="medium" {{ $complaint->priority == 'medium' ? 'selected' : '' }}>
                            Medium
                        </option>

                        <option value="high" {{ $complaint->priority == 'high' ? 'selected' : '' }}>
                            High
                        </option>

                    </select>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ old('description', $complaint->description) }}</textarea>
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Update Complaint

                </button>

                <a
                    href="{{ route('complaints.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection