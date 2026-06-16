@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Add New Tenant
        </h1>

        <p class="text-gray-500 mt-1">
            Add a new tenant to the society.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
    <form action="{{route('tenants.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Tenant Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Tenant Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
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
                                {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
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
                        value="{{ old('phone') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>



                <!-- Aadhaar No -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Aadhaar No
                    </label>

                    <input
                        type="text"
                        name="aadhaar_no"
                        value="{{ old('aadhaar_no') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Occupation -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Occupation
                    </label>

                    <input
                        type="text"
                        name="occupation"
                        value="{{ old('occupation') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Agreement Start -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Agreement Start
                    </label>

                    <input
                        type="date"
                        name="agreement_start"
                        value="{{ old('agreement_start') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Agreement End -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Agreement End
                    </label>

                    <input
                        type="date"
                        name="agreement_end"
                        value="{{ old('agreement_end') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- ID Proof -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID Proof
                    </label>

                    <input
                        type="file"
                        name="id_proof"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Agreement Copy -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Agreement Copy
                    </label>

                    <input
                        type="file"
                        name="agreement_copy"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Police Verification -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Police Verification
                    </label>

                    <input
                        type="file"
                        name="police_verification"
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
                

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Add Tenant

                </button>

                <a
                    href="{{ route('tenants.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
</div>
@endsection