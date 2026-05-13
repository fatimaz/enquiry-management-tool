@extends('admin.layouts.master')

@section('content')
    <div class="col-md-11 mx-3">
        @include('admin.includes.alerts.success')
        @include('admin.includes.alerts.errors')

        <div class="card-header d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0">
                    {{ isset($title) ? $title . ' Enquiries' : 'All Enquiries' }}
                </h4>
                <small class="text-muted">
                    @if (isset($title) && $title == 'New')
                        Recently submitted enquiries awaiting review.
                    @elseif(isset($title) && $title == 'Reviewed')
                        Enquiries that have already been reviewed.
                    @elseif(isset($title) && $title == 'Closed')
                        Closed enquiries and completed requests.
                    @else
                        View submitted client enquiries and manage their status.
                    @endif
                </small>
                <small class="text-muted fw-bold">
                    {{ $enquiries->total() }} found
                </small>
            </div>

            @isset($title)
                <a href="{{ route('enquiries.index') }}" class="btn btn-outline-secondary btn-sm">
                    Back to all enquiries
                </a>
            @endisset
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Submitted enquiries</h5>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3 mt-3 mx-3">
                <form method="GET" action="{{ route('enquiries.index') }}" class="row g-2 align-items-center flex-grow-1">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm"
                            placeholder="Search enquiries by name, email or phone.." value="{{ request('search') }}">
                    </div>

                    <div class="col-md-3">
                        <select name="service_interest" class="form-select form-select-sm">
                            <option value="">All services</option>
                            <option value="Strategy & Planning"
                                {{ request('service_interest') == 'Strategy & Planning' ? 'selected' : '' }}>
                                Strategy & Planning
                            </option>

                            <option value="Operations" {{ request('service_interest') == 'Operations' ? 'selected' : '' }}>
                                Operations
                            </option>

                            <option value="HR & People"
                                {{ request('service_interest') == 'HR & People' ? 'selected' : '' }}>
                                HR & People
                            </option>

                            <option value="Finance" {{ request('service_interest') == 'Finance' ? 'selected' : '' }}>
                                Finance
                            </option>
                        </select>
                    </div>
                    @php
                        $selectedStatus = request('status');

                        if (isset($title)) {
                            $selectedStatus = strtolower($title);
                        }
                    @endphp
                    <div class="col-md-3">

                        <select name="status" class="form-select form-select-sm">
                            <option value="">All statuses</option>
                            <option value="new" {{ $selectedStatus == 'new' ? 'selected' : '' }}>New</option>
                            <option value="reviewed" {{ $selectedStatus == 'reviewed' ? 'selected' : '' }}>Reviewed
                            </option>
                            <option value="closed" {{ $selectedStatus == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm" type="submit">
                            Search
                        </button>
                        @if (request('search') || request('status') || request('service_interest'))
                            <a href="{{ route('enquiries.index') }}" class="btn btn-outline-secondary btn-sm">Clear</a>
                        @endif
                    </div>
                </form>

                <a href="{{ route('enquiries.create') }}" class="btn btn-primary btn-sm">
                    + Add enquiry
                </a>
            </div>
            <div class="card-body">

                <div class="table-responsive" style="overflow: visible;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->id }}</td>
                                    <td>{{ $enquiry->name }}</td>
                                    <td>{{ $enquiry->email }}</td>
                                    <td>{{ $enquiry->phone ?? 'N/A' }}</td>
                                    <td>{{ $enquiry->service_interest }}</td>
                                    <td>
                                        @if ($enquiry->status == 'new')
                                            <span class="badge bg-warning">New</span>
                                        @elseif ($enquiry->status == 'reviewed')
                                            <span class="badge text-bg-light border text-dark">Reviewed</span>
                                        @else
                                            <span class="badge bg-success">Closed</span>
                                        @endif
                                    </td>
                                    <td>{{ $enquiry->created_at->format('d M Y') }}</td>

                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('enquiries.show', $enquiry->id) }}">
                                                    <i style="color: green" class="fa fa-eye"></i>&nbsp;View
                                                </a>

                                                <a class="dropdown-item"
                                                    href="{{ route('enquiries.edit', $enquiry->id) }}">
                                                    <i style="color: blue" class="fa fa-edit"></i>&nbsp;Edit
                                                </a>

                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#update_status{{ $enquiry->id }}">
                                                    <i style="color: orange" class="fa fa-spinner"></i>&nbsp;Change status
                                                </a>

                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#Delete_Enquiry{{ $enquiry->id }}">
                                                    <i style="color: red" class="fa fa-trash"></i>&nbsp;Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                     {{-- delete and update status modals --}}
                                    @include('admin.enquiries.delete')
                                    @include('admin.enquiries.update_status')
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No enquiries available yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- pagination --}}
        <div class="mt-3 d-flex justify-content-center">
            {{ $enquiries->links('pagination::bootstrap-5') }}
        </div>

        <div class="mt-2 text-center text-muted small">
            Page {{ $enquiries->currentPage() }} of {{ $enquiries->lastPage() }}
        </div>

    </div>
@endsection
