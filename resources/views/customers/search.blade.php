@extends('layout')
@section('title','edit customer')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Search') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('search') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="search_query" class="col-md-4 col-form-label text-md-right">{{ __('Search Query') }}</label>

                                <div class="col-md-6">
                                    <input id="search_query" type="text" class="form-control @error('search_query') is-invalid @enderror" name="search_query" value="{{ old('search_query') }}" required autocomplete="search_query" autofocus>

                                    @error('search_query')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Search') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if(isset($results))
                    <div class="card mt-3">
                        <div class="card-header">{{ __('Search Results') }}</div>

                        <div class="card-body">
                            @if(count($results) > 0)
                                <ul>
                                    @foreach($results as $result)
                                        <li><a href="{{ $result->url }}">{{ $result->title }}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <p>{{ __('No results found.') }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
