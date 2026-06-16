@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Complaint Details</h1>

        <a href="{{ route('complaints.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">
            Back
        </a>
    </div>

    <!-- Complaint Card -->
    <div class="bg-white shadow rounded-xl p-6 mb-6">
        <div class="flex items-center gap-6">

            <div class="grid grid-cols-2 gap-x-10 gap-y-3">
                <div>
                    <span class="font-semibold">Name:</span>
                    {{ $complaint->member->name }}
                </div>

                <div>
                    <span class="font-semibold">Title:</span>
                    {{ $complaint->title }}
                </div>

                <div>
                    <span class="font-semibold">description:</span>
                    {{ $complaint->description }}
                </div>

                <div>
                    <span class="font-semibold">Status:</span>
                    @if($complaint->status == 'open')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                            Open
                        </span>
                    @elseif($complaint->status == 'in_progress')
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">
                            In Progress
                        </span>
                    @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                            Resolved
                        </span>
                    @endif
                </div>

                <div>
                    <span class="font-semibold">Priority:</span>
                        @if($complaint->priority == 'low')
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                            Low
                        </span>
                    @elseif($complaint->priority == 'medium')
                        <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs">
                            Medium
                        </span>
                    @else
                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs">
                            High
                        </span>
                    @endif
                </div>
            </div>

        </div>
    </div>

</div>
@endsection