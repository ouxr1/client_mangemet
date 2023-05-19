@extends('layout')

@section('title', 'Show Customer')

@section('content')
    <div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Customer Details</h4>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Name:</strong> {{ $customer->full_name }}
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <a href="mailto:{{ $customer->email }}" class="text-decoration-none">
                                <i class="fas fa-envelope me-2"></i>
                                {{ $customer->email }}
                            </a>
                        </div>
                        <div class="mb-3">
                            <strong>Phone:</strong>
                            <a href="tel:{{ $customer->phone_number }}" class="text-decoration-none">
                                <i class="fas fa-phone me-2"></i>
                                {{ $customer->phone_number }}
                            </a>
                        </div>
                        <div class="mb-3">
                            <strong>Company:</strong> {{ $customer->company_name }}
                        </div>
                        @if ($customer->linkedin_profile)
                            <div class="mb-3">
                                <strong>LinkedIn:</strong>
                                <a href="{{ $customer->linkedin_profile }}" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-linkedin me-2"></i>
                                    {{ $customer->linkedin_profile }}
                                </a>
                            </div>
                        @endif
                        <div class="mb-3">
                            <strong>Interested:</strong> {{ $customer->interested }}
                        </div>
                        <div class="mb-3">
                            <strong>Position:</strong> {{ $customer->Position }}
                        </div>
                        <div class="mb-3">
                            <strong>Purchase:</strong> {{ $customer->purchase }}
                        </div>
                        <div class="mb-3">
                            <strong>Country:</strong> {{ $customer->country }}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('customers.index') }}" class="btn btn-primary">
                                Back to Customers List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
