@extends('admin.layouts.master')

@section('content')
    <div class="col-md-8 mx-auto">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Submit Enquiry</h4>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">Back</a>
            </div>

            <div class="card-body">
                <p class="text-secondary mb-4">
                    Please fill in the form below and we will record your enquiry.
                </p>
                <form action="{{ route('enquiries.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone number <span class="text-muted">(optional)</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service of interest</label>
                        <select name="service_interest" class="form-select">
                            <option value="">Choose...</option>
                            <option value="Strategy & Planning"
                                {{ old('service_interest') == 'Strategy & Planning' ? 'selected' : '' }}>
                                Strategy & Planning
                            </option>
                            <option value="Operations" {{ old('service_interest') == 'Operations' ? 'selected' : '' }}>
                                Operations
                            </option>
                            <option value="HR & People" {{ old('service_interest') == 'HR & People' ? 'selected' : '' }}>
                                HR & People
                            </option>
                            <option value="Finance" {{ old('service_interest') == 'Finance' ? 'selected' : '' }}>
                                Finance
                            </option>
                        </select>
                        @error('service_interest')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brief description of your enquiry</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                </form>
            </div>
        </div>
    </div>
@endsection
