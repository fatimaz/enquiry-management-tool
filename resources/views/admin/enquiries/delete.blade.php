<!-- Modal for Enquiry Deletion -->
<div class="modal fade" id="Delete_Enquiry{{ $enquiry->id }}" tabindex="-1"
     aria-labelledby="DeleteEnquiryLabel{{ $enquiry->id }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="DeleteEnquiryLabel{{ $enquiry->id }}">
                    Delete Enquiry
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <h5>
                        Are you sure you want to delete the enquiry from
                        <strong>{{ $enquiry->name }}</strong>?
                    </h5>

                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>