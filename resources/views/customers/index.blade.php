    @extends('layout')
    @section('title', 'Show Customers')
    @section('content')
<header>
    <link rel="stylesheet" href="{{ asset('css/CustomerStyle.css') }}">
</header>

<nav class="navbar navbar-light bg-light justify-content-between">
    <form action="{{ route('customers.index') }}" method="GET" class="form-inline">
      <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search customers..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>

<div class="modal fade" id="createCustomerModal" tabindex="-1" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCustomerModalLabel">Create Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('customer.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>

                <div class="mb-3">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" required>
                </div>

                <div class="mb-3">
                    <label for="linkedin_username" class="form-label">LinkedIn Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="linkedin-link">https://www.linkedin.com/in/</span>
                        <input type="text" class="form-control" id="linkedin_username" name="linkedin_username" >
                    </div>
                </div>


                <div class="mb-3">
                    <label for="interested" class="form-label">Interested</label>
                    <select class="form-select" id="interested" name="interested" required>
                        <option value="1">yes</option>
                        <option value="0">No</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="Position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="Position" name="Position" required>
                </div>

                <div class="mb-3">
                    <label for="purchase" class="form-label">Purchase</label>
                    <input type="text" class="form-control" id="purchase" name="purchase" required>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
      </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCustomerModal">Create Customer</button>
<div class="card shadow-lg">
    <div class="card-body">
        <div class="table-responsive">

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
                        <tr class="{{ $customer->interested ? 'bg-success' : '' }}">
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
