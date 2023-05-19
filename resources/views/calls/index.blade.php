@extends('layout')

@section('content')
<header>
    <link rel="stylesheet" href="{{ asset('css/callIndex.css') }}">
</header>
  <!-- Create Call Modal -->
<div class="modal fade" id="createCallModal" tabindex="-1" role="dialog" aria-labelledby="createCallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="createCallModalLabel">Add New Call</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                        <input type="date" class="form-control" id="next_call_date" name="next_call_date" value="{{ old('next_call_date') }}" >
                    </div>
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <button type="submit" class="btn btn-primary btn-block mt-3">Submit</button>
                </form>
        </div>
      </div>
    </div>
  </div>
{{-- end model  --}}

<div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Calls for {{ $customer->full_name }}
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCallModal">
                <i class="fas fa-plus-circle"></i> Add New Call
              </button>

          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th>Date</th>
                <th>Comment</th>
                <th>Date of Next Call</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($calls)
              @foreach($calls as $call)
              <tr>
                <td>{{ date('d-m-Y', strtotime($call->call_date)) }}</td>
                <td>{{ $call->comment }}</td>
                <td>{{ $call->next_call_date ? date('d-m-Y', strtotime($call->next_call_date)) : '-' }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('calls.edit', [$customer->id, $call->id]) }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('calls.destroy', ['customer' => $customer->id, 'call' => $call->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this call record?')">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
