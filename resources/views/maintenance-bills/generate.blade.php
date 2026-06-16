@extends('layouts.app')
@section('content')

<form action="{{ route('maintenance-bills.generate') }}" method="post">
    @csrf

    <div>
        <label>Month</label>
        <select name="bill_month">
            @for($i=1;$i<=12;$i++)
                <option value="{{ $i }}">
                    {{ date('F', mktime(0,0,0,$i,1)) }}
                </option>
            @endfor
        </select>
    </div>

    <div>
        <label>Year</label>
        <input type="number"
               name="bill_year"
               value="{{ date('Y') }}">
    </div>

    <button type="submit">
        Generate Bills
    </button>
</form>

@endsection