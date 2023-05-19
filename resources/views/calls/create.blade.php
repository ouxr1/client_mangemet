@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">Add Call Record</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('calls.store', $customer->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="call_date">Call Date</label>
                                <input type="date" class="form-control" id="call_date" name="call_date" value="{{ old('call_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="5" required>{{ old('comment') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="next_call_date">Date of Next Call</label>
                                <input type="date" class="form-control" id="next_call_date" name="next_call_date" value="{{ old('next_call_date') }}" required>
                            </div>
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>


    .form-group label {
        font-weight: bold;
        color: #555;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .mt-3 {
        margin-top: 1rem;
    }
</style>
