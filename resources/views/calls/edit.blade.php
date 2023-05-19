@extends('layout')

@section('content')
    <div class="container">
        <h1>Edit Call</h1>

        <form method="POST" action="{{ route('calls.update', [$customer->id, $call->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" value="{{ $call->date }}" required>
            </div>
            <div class="form-group">
                <label for="next_call_date">Date:</label>
                <input type="date" name="next_call_date" class="form-control" value="{{ $call->next_call_date }}" >
            </div>

            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="comment" class="form-control" rows="3" required>{{ $call->comment }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
