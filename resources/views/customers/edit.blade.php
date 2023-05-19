@extends('layout')
@section('title','edit customer')
@section('content')
<div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Edit Customer
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('customer.update', $customer->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $customer->company_name) }}" required>
                            @error('company_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="linkedin_profile">LinkedIn Profile (optional)</label>
                            <input type="text" class="form-control" id="linkedin_profile" name="linkedin_profile" value="{{ old('linkedin_profile', $customer->linkedin_profile) }}">
                            @error('linkedin_profile')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="interested">Interested In</label>
                            <select class="form-control" id="interested" name="interested" required>
                                <option value="1" @if(old('interested', $customer->interested) == 'Yes') selected @endif>Yes</option>
                                <option value="0" @if(old('interested', $customer->interested) == 'No') selected @endif>No</option>
                            </select>
                            @error('interested')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Position">Position</label>
                            <input type="text" class="form-control" id="Position" name="Position" value="{{ old('Position', $customer->Position) }}" required>
                            @error('Position')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="purchase" class="form-label">Purchase</label>
                            <input type="text" class="form-control" id="purchase" name="purchase" value="{{ $customer->purchase }}">
                            @error('purchase')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ $customer->country }}">
                            @error('country')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
