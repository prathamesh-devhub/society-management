@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Tenant Details</h1>

        <a href="{{ route('tenants.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Back
        </a>
    </div>

    <!-- Tenant Card -->
    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <div class="flex items-center gap-6">

            <div class="grid grid-cols-2 gap-x-10 gap-y-3">
                <div>
                    <span class="font-semibold">Name:</span>
                    {{ $tenant->name }}
                </div>

                <div>
                    <span class="font-semibold">Email:</span>
                    {{ $tenant->email }}
                </div>

                <div>
                    <span class="font-semibold">Phone:</span>
                    {{ $tenant->phone }}
                </div>

                <div>
                    <span class="font-semibold">Wing:</span>
                    {{ $tenant->member->wing }}
                </div>

                <div>
                    <span class="font-semibold">Flat Number:</span>
                    {{ $tenant->member->flat_number }}
                </div>
            </div>

        </div>
    </div>

</div>
@endsection