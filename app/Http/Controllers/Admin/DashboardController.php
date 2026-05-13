<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    // Display dashboard statistics and latest new enquiries.
    public function index()
    {
        $data['totalEnquiries'] = Enquiry::count();
        $data['newEnquiries'] = Enquiry::where('status', 'new')->count();
        $data['reviewedEnquiries'] = Enquiry::where('status', 'reviewed')->count();
        $data['closedEnquiries'] = Enquiry::where('status', 'closed')->count();

        $data['enquiries'] = Enquiry::where('status', 'new')->latest()->take(10)->get();

        return view('admin.dashboard.index', $data);
    }
    
    // Display all new enquiries.
    public function showNewEnquiries()
    {
        $enquiries = Enquiry::where('status', 'new')->orderBy('created_at', 'desc')->paginate(10);

        $title = 'New';

        return view('admin.enquiries.index', compact('enquiries', 'title'));
    }

    // Display all reviewed enquiries.
    public function showReviewedEnquiries()
    {
        $enquiries = Enquiry::where('status', 'reviewed')->orderBy('created_at', 'desc')->paginate(10);

        $title = 'Reviewed';

        return view('admin.enquiries.index', compact('enquiries', 'title'));
    }
    
    // Display all closed enquiries.
    public function showClosedEnquiries()
    {
        $enquiries = Enquiry::where('status', 'closed')->orderBy('created_at', 'desc')->paginate(10);

        $title = 'Closed';

        return view('admin.enquiries.index', compact('enquiries', 'title'));
    }
}