@extends('layout')
@section('title', 'Next Call Dates')
@section('content')
<header>
    
<link rel="stylesheet" href="{{ asset('css/nextCallDate.css') }}">
</header>
<div class="card">
    <div class="card-header">
        Next Call Dates
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Last Next Call Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->full_name }}</td>
                        <td>
                            @if (isset($lastNextCallDates[$customer->id]))
                                {{ date('d-m-Y', strtotime($lastNextCallDates[$customer->id])) }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
