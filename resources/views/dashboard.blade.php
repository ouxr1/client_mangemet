@extends('layout')

@section('content')
<header>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</header>

<div >
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white mb-4 shadow">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-users fa-3x"></i> Customers</h2>
                    <p class="card-text">Total number of customers: {{ $customersCount }}</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-light">View Customers</a>
                </div>
                <i class="bi bi-people card-icon text-white"></i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-secondary text-white mb-4 shadow">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-phone fa-3x"></i> Calls</h2>
                    <p class="card-text">Total number of calls: {{ $callsCount }}</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-light">View Calls</a>
                </div>
                <i class="bi bi-telephone-outbound card-icon text-white"></i>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-success text-white mb-4 shadow">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-user-check fa-3x"></i> Interested Customers</h2>
                    <p class="card-text">Total number of interested customers: {{ $interestedCustomersCount }} </p>
                    <a href="{{ route('intersted') }}" class="btn btn-light">View Interested Customers</a>
                </div>
                <i class="bi bi-emoji-smile interested-customers text-white"></i>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-info text-white mb-4 shadow">
                <div class="card-body">
                    <h2 class="card-title"><i class="fas fa-calendar-alt fa-3x"></i> Next Call Date</h2>
                    <p class="card-text">Next call date: {{ $nextCallDate }}</p>
                    <a href="{{ route('next_call_date') }}" class="btn btn-light">Schedule Calls</a>
                </div>
                <i class="bi bi-calendar2-check card-icon text-white"></i>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.card').hide().fadeIn(1000);
    });
</script>


@endsection
