@extends('layouts.app')
@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Generate Bills
        </h1>

        <p class="text-gray-500 mt-1">
            create bills for selected month and year.
        </p>
    </div>

    <div class="bg-white shadow rounded-xl p-6">
    <form method="post">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Month -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Month
                    </label>

                    <select
                        name="bill_month"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500">
                    @for($i=1;$i<=12;$i++)
                        <option value="{{ $i }}">
                            {{ date('F', mktime(0,0,0,$i,1)) }}
                        </option>
                    @endfor
                    </select>
                </div>

                <!-- Year -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Year
                    </label>

                    <input
                        type="number"
                        name="bill_year"
                        value="{{ date('Y') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

            </div>

            <div class="mt-6 flex gap-3">

                <button
                    type="submit"
                    formaction="{{ route('maintenance-bills.generate') }}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Generate Bills

                </button>

                <button
                    type="submit"
                    formaction="{{ route('maintenance-bills.emailBulk') }}"
                    class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

                    Email Bills

                </button>

                <a
                    href="{{ route('maintenance-bills.index') }}"
                    class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300">

                    Cancel

                </a>

            </div>
        </form>
</div>
@endsection