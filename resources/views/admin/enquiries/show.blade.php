@extends('admin.layouts.master')

@section('content')
    <div class="col-md-10 mx-auto">

        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0">Enquiry Details</h4>
                    <small class="text-muted">
                        View full enquiry information.
                    </small>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('enquiries.edit', ['enquiry' => $enquiry->id, 'back' => 'show']) }}"
                       class="btn btn-success">
                        Edit
                    </a>

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#update_status{{ $enquiry->id }}">
                        Change Status
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#Delete_Enquiry{{ $enquiry->id }}">
                        Delete
                    </button>

                    <a href="{{ route('enquiries.index') }}" class="btn btn-outline-secondary">
                        Back
                    </a>
                </div>
            </div>

            <div class="card-body">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Full name</label>
                        <div class="p-3 bg-light border rounded">
                            {{ $enquiry->name }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Email address</label>
                        <div class="p-3 bg-light border rounded">
                            {{ $enquiry->email }}
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Phone number</label>
                        <div class="p-3 bg-light border rounded">
                            {{ $enquiry->phone ?? 'N/A' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Service of interest</label>
                        <div class="p-3 bg-light border rounded">
                            {{ $enquiry->service_interest }}
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Status</label>
                        <div>
                            @if ($enquiry->status == 'new')
                                <span class="badge bg-warning text-dark">New</span>
                            @elseif ($enquiry->status == 'reviewed')
                                <span class="badge text-bg-light border text-dark">Reviewed</span>
                            @else
                                <span class="badge bg-success">Closed</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="fw-bold mb-1">Submitted at</label>
                        <div class="p-3 bg-light border rounded">
                           {{ $enquiry->created_at->format('d M Y H:i') }}
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-bold mb-1">Enquiry description</label>

                    <div class="form-control bg-light" style="min-height: 150px;">
                        {{ $enquiry->description }}
                    </div>
                </div>

            </div>
        </div>
           @include('admin.enquiries.delete')
           @include('admin.enquiries.update_status')
    </div>
@endsection
