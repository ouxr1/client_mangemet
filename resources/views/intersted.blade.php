@extends('layout')
@section('title', 'Show Customers')
@section('content')
<header>
    <link rel="stylesheet" href="{{ asset('css/intersted.css') }}">
</header>

<nav class="navbar navbar-light bg-light justify-content-between">
    <form action="{{ route('customers.index') }}" method="GET" class="form-inline">
      <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search customers..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>

<div class="card shadow-lg">
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCustomerModal">Create Customer</button>
            @if ($customers->count() > 0)
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>LinkedIn</th>
                        <th>Company</th>
                        <th>Position</th>
                        <th>Purchase</th>
                        <th>Country</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        @if ($customer->interested)
                        <tr >
                            <td>
                                <a href={{route('customer.show', $customer->id)}}>
                                    {{ $customer->full_name }}
                                </a>
                            </td>
                            <td>
                                <a href="mailto:{{ $customer->email }}" target="_blank" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $customer->email }}">
                                    <i class="fas fa-envelope me-2"></i>
                                    <span class="sr-only">{{ $customer->email }}</span>
                                </a>
                            </td>
                            <td>
                                <a href="tel:{{ $customer->phone_number }}" target="_blank" class="text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $customer->phone_number }}">
                                    <i class="fas fa-phone me-2"></i>
                                    <span class="sr-only">{{ $customer->phone_number }}</span>
                                </a>
                            </td>
                            <td>
                                @if ($customer->linkedin_profile)
                                    <a href="{{ $customer->linkedin_profile }}" target="_blank" class="text-decoration-none">
                                        <i class="fab fa-linkedin me-2"></i>
                                        <span class="sr-only">{{ $customer->linkedin_profile }}</span>
                                    </a>
                                    @endif
                                </td>
                            <td>{{ $customer->company_name }}</td>
                            <td>{{ $customer->Position }}</td>
                            <td>{{ $customer->purchase }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>
                                <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-edit">
                                  <i class="fas fa-edit"></i>
                                  Edit
                                </a>
                              </td>
                              <td>
                                <form action="{{ route('customer.destroy', $customer->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                  </button>
                                </form>
                              </td>
                              <td>
                              <a href="{{ route('calls.index',  $customer->id) }}"><i class="fa fa-history"></i></a>
                              </td>

                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            @else
            <tr>
                <td colspan="5">No customers found.</td>
            </tr>
            @endif
        </div>
    </div>

    <div class="card-footer">
        <div class="d-flex justify-content-center">
            {{ $customers->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
</div>
@endsection
