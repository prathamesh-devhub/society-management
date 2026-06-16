@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Edit Settings
        </h1>

        <p class="text-gray-500 mt-1">
            Update society settings and preferences.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{route('settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
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
                        name="society_name"
                        value="{{ old('society_name', $setting->society_name) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
                
                <!-- Registration Number -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Registration Number
                    </label>

                    <input
                        type="text"
                        name="registration_no"
                        value="{{ old('registration_no', $setting->registration_no) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Address
                    </label>

                    <input
                        type="text"
                        name="address"
                        value="{{ old('address', $setting->address) }}"
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
                        value="{{ old('email', $setting->email) }}"
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
                        value="{{ old('phone', $setting->phone) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Bank Name -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Bank Name
                    </label>

                    <input
                        type="text"
                        name="bank_name"
                        value="{{ old('bank_name', $setting->bank_name) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Account Number -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Account Number
                    </label>

                    <input
                        type="text"
                        name="account_no"
                        value="{{ old('account_no', $setting->account_no) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- IFSC Code -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        IFSC Code
                    </label>

                    <input
                        type="text"
                        name="ifsc_code"
                        value="{{ old('ifsc_code', $setting->ifsc_code) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Repair Rate -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Repair Rate
                    </label>

                    <input
                        type="text"
                        name="repair_rate"
                        value="{{ old('repair_rate', $setting->repair_rate) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Sinking Rate -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Sinking Rate
                    </label>

                    <input
                        type="text"
                        name="sinking_rate"
                        value="{{ old('sinking_rate', $setting->sinking_rate) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Building Rate -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Building Rate
                    </label>

                    <input
                        type="text"
                        name="building_rate"
                        value="{{ old('building_rate', $setting->building_rate) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Electricity Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Electricity Charge
                    </label>

                    <input
                        type="text"
                        name="electricity_charge"
                        value="{{ old('electricity_charge', $setting->electricity_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Water Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Water Charge
                    </label>

                    <input
                        type="text"
                        name="water_charge"
                        value="{{ old('water_charge', $setting->water_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Service Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Service Charge
                    </label>

                    <input
                        type="text"
                        name="service_charge"
                        value="{{ old('service_charge', $setting->service_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Lift Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Lift Charge
                    </label>

                    <input
                        type="text"
                        name="lift_charge"
                        value="{{ old('lift_charge', $setting->lift_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Insurance Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Insurance Charge
                    </label>

                    <input
                        type="text"
                        name="insurance_charge"
                        value="{{ old('insurance_charge', $setting->insurance_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Education Charge -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Education Charge
                    </label>

                    <input
                        type="text"
                        name="education_charge"
                        value="{{ old('education_charge', $setting->education_charge) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Interest Rate -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Interest Rate
                    </label>

                    <input
                        type="text"
                        name="interest_rate"
                        value="{{ old('interest_rate', $setting->interest_rate) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <!-- Bill Due Day -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Bill Due Day
                    </label>

                    <input
                        type="text"
                        name="bill_due_day"
                        value="{{ old('bill_due_day', $setting->bill_due_day) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                @if($setting->logo)
                    <!-- Society Logo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Society Logo
                        </label>
                        <img src="{{ Storage::url($setting->logo) }}" alt="Society Logo" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif

                    <input
                        type="file"
                        name="logo"
                        value ="{{ old('logo', $setting->logo) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>
            </div>
            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Update Settings

                </button>

                <a
                    href="{{ route('settings.show') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
    </div>
</div>
@endsection