@extends('admin.layouts.master')

@section('content')
    <div class="col-md-8 mx-auto">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')
        @php
            $backUrl = request('back') === 'show'
                ? route('enquiries.show', $enquiry->id)
                : route('enquiries.index');
        @endphp
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Enquiry</h4>
                <a href="{{ $backUrl }}" class="btn btn-outline-primary">Back</a>
            </div>
 
            <div class="card-body">
                <form action="{{ route('enquiries.update', $enquiry->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $enquiry->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $enquiry->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone number <span class="text-muted">(optional)</span></label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $enquiry->phone) }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Service of interest</label>
                        <select name="service_interest" class="form-select">
                            <option value="">Choose...</option>
                            <option value="Strategy & Planning"
                                {{ old('service_interest', $enquiry->service_interest) == 'Strategy & Planning' ? 'selected' : '' }}>
                                Strategy & Planning
                            </option>
                            <option value="Operations"
                                {{ old('service_interest', $enquiry->service_interest) == 'Operations' ? 'selected' : '' }}>
                                Operations
                            </option>
                            <option value="HR & People"
                                {{ old('service_interest', $enquiry->service_interest) == 'HR & People' ? 'selected' : '' }}>
                                HR & People
                            </option>
                            <option value="Finance"
                                {{ old('service_interest', $enquiry->service_interest) == 'Finance' ? 'selected' : '' }}>
                                Finance
                            </option>
                        </select>
                        @error('service_interest')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="new" {{ old('status', $enquiry->status) == 'new' ? 'selected' : '' }}>
                                New
                            </option>
                            <option value="reviewed" {{ old('status', $enquiry->status) == 'reviewed' ? 'selected' : '' }}>
                                Reviewed
                            </option>
                            <option value="closed" {{ old('status', $enquiry->status) == 'closed' ? 'selected' : '' }}>
                                Closed
                            </option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brief description of the enquiry</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $enquiry->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Update Enquiry
                        </button>

                        <a href="{{ $backUrl }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
