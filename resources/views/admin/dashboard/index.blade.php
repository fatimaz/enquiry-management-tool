@extends('admin.layouts.master')

@section('content')
    <div class="col-lg-11 mx-auto">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')

        <h3>Enquiry Overview</h3>
        <p class="text-muted mb-4">
            Overview of submitted client enquiries.
        </p>
        <div class="row mb-5">
            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100" style="background-color: #e9f8fb;">
                    <div class="card-body">
                        <p class="text-muted mb-1">Total Enquiries</p>
                        <h2 class="fw-bold mb-3">{{ $totalEnquiries }}</h2>
                        <a href="{{ route('enquiries.index') }}" class="text-decoration-none">
                            Show all enquiries →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100 bg-warning-subtle">
                    <div class="card-body">
                        <p class="text-muted mb-1">New Enquiries</p>
                        <h2 class="fw-bold mb-3">{{ $newEnquiries }}</h2>
                        <a href="{{ route('admin.enquiries.new') }}" class="text-decoration-none">
                            Show new enquiries →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
               <div class="card border-0 shadow-sm h-100 bg-secondary-subtle">
                    <div class="card-body">
                        <p class="text-muted mb-1">Reviewed Enquiries</p>
                        <h2 class="fw-bold mb-3">{{ $reviewedEnquiries }}</h2>
                        <a href="{{ route('admin.enquiries.reviewed') }}" class="text-decoration-none">
                            Show reviewed enquiries →
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card border-0 shadow-sm h-100 bg-success-subtle">
                    <div class="card-body">
                        <p class="text-muted mb-1">Closed Enquiries</p>
                        <h2 class="fw-bold mb-3">{{ $closedEnquiries }}</h2>
                        <a href="{{ route('admin.enquiries.closed') }}" class="text-decoration-none">
                            Show closed enquiries →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Latest New Enquiries</h4>
            <a href="{{ route('enquiries.index') }}" class="btn btn-outline-primary btn-sm">
                View all
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->id }}</td>
                                    <td>{{ $enquiry->name }}</td>
                                    <td>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->service_interest }}</td>
                                    <td>
                                        @if ($enquiry->status == 'new')
                                            <span class="badge bg-warning text-dark">New</span>
                                        @elseif ($enquiry->status == 'reviewed')
                                            <span class="badge text-bg-light border text-dark">Reviewed</span>
                                        @else
                                            <span class="badge bg-success">Closed</span>
                                        @endif
                                    </td>
                                    <td>{{ $enquiry->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('enquiries.show', $enquiry->id) }}" class="btn btn-light ">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No new enquiries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
