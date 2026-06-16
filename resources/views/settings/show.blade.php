@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">
            Society Settings
        </h1>

        <a href="{{ route('settings.edit') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Edit Settings
        </a>
    </div>

    <div class="bg-white shadow rounded-xl p-6">

        <div class="mb-4">
            <strong>Society Name:</strong>
            {{ $setting->society_name }}
        </div>

        <div class="mb-4">
            <strong>Registration No:</strong>
            {{ $setting->registration_no }}
        </div>

        <div class="mb-4">
            <strong>Address:</strong>
            {{ $setting->address }}
        </div>

        <div class="mb-4">
            <strong>Email:</strong>
            {{ $setting->email }}
        </div>

        <div class="mb-4">
            <strong>Phone:</strong>
            {{ $setting->phone }}
        </div>

    </div>

</div>

@endsection