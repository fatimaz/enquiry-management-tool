<!-- Modal for Enquiry Status Update -->
<div class="modal fade" id="update_status{{ $enquiry->id }}" tabindex="-1"
     aria-labelledby="UpdateStatusLabel{{ $enquiry->id }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="UpdateStatusLabel{{ $enquiry->id }}">
                    Change Status
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('enquiries.updateStatus', $enquiry->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <p>
                        This enquiry is currently
                        <strong>{{ ucfirst($enquiry->status) }}</strong>.
                    </p>

                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select class="form-select" name="status" required>
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
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Update Status
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>