@extends('layouts.app')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard
    </h1>

```
<p class="text-gray-500 mt-1">
    Welcome to your Society Management System
</p>
```

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

```
<div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-500">
    <h3 class="text-gray-500 text-sm font-medium">
        Total Members
    </h3>

    <p class="text-3xl font-bold text-gray-800 mt-2">
        {{ $members }}
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
    <h3 class="text-gray-500 text-sm font-medium">
        Total Complaints
    </h3>

    <p class="text-3xl font-bold text-gray-800 mt-2">
        {{ $complaints }}
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6 border-l-4 border-yellow-500">
    <h3 class="text-gray-500 text-sm font-medium">
        Open Complaints
    </h3>

    <p class="text-3xl font-bold text-gray-800 mt-2">
        {{ $open_complaints }}
    </p>
</div>

<div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-500">
    <h3 class="text-gray-500 text-sm font-medium">
        Resolved Complaints
    </h3>

    <p class="text-3xl font-bold text-gray-800 mt-2">
        {{ $closed_complaints }}
    </p>
</div>
```

</div>

<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">

```
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">
        Quick Actions
    </h2>

    <div class="space-y-3">

        <a href="{{ route('members.create') }}"
           class="block bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700">
            Add New Member
        </a>

        <a href="{{ route('complaints.create') }}"
           class="block bg-red-600 text-white text-center py-3 rounded-lg hover:bg-red-700">
            Create Complaint
        </a>

    </div>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">
        System Overview
    </h2>

    <ul class="space-y-2 text-gray-600">
        <li>Total Members: {{ $members }}</li>
        <li>Total Complaints: {{ $complaints }}</li>
        <li>Open Complaints: {{ $open_complaints }}</li>
        <li>Resolved Complaints: {{ $closed_complaints }}</li>
    </ul>
</div>

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">
        Recent Notices
    </h2>

    @forelse($notices as $notice)
        <div class="border-b py-2">
            <h3 class="text-md font-medium text-gray-800">
                {{ $notice->title }}
            </h3>
            <div class="text-sm text-gray-500">
            {{ $notice->category }}
            •
            {{ $notice->publish_date }}
        </div>
        </div>
    @empty
        <p class="text-gray-500 text-center py-4">
            No active notices at the moment.
        </p>
    @endforelse
</div>

</div>

@endsection
