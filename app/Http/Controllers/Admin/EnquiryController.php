<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EnquiryRequest;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    // Display enquiries with optional search and filters.
    public function index(Request $request)
    {
        $query = Enquiry::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('service_interest', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('service_interest')) {
            $query->where('service_interest', $request->service_interest);
        }

        $enquiries = $query->orderBy('created_at', 'desc')
                           ->paginate(10)
                           ->appends($request->query());

        return view('admin.enquiries.index', compact('enquiries'));
    }
    
    public function create()
    {
        return view('admin.enquiries.add');
    }
    // Store a new enquiry
    public function store(EnquiryRequest $request)
    {
        try {
            Enquiry::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service_interest' => $request->service_interest,
                'description' => $request->description,
                'status' => 'new',
            ]);

            return redirect()->route('enquiries.index')->with('success', 'Enquiry submitted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                            ->with('error', 'There was an error submitting your enquiry. Please try again.');
        }
    }
     // Show full details for one enquiry.
    public function show(string $id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function edit(string $id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('admin.enquiries.edit', compact('enquiry'));
    }
     
    // Update enquiry details.
    public function update(EnquiryRequest $request, string $id)
    {
        try {
            $enquiry = Enquiry::findOrFail($id);

            $enquiry->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service_interest' => $request->service_interest,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return redirect()->route('enquiries.index')
                             ->with('success', 'Enquiry updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->withInput()
                             ->with('error', 'There was an error. Please try again.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $enquiry = Enquiry::findOrFail($id);
            $enquiry->delete();

            return redirect()->route('enquiries.index')
                             ->with('success', 'Enquiry deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'There was an error. Please try again.');
        }
    }

    // Update the enquiry status.
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:new,reviewed,closed',
        ]);

        try {
            $enquiry = Enquiry::findOrFail($id);

            $enquiry->update([
                'status' => $request->status,
            ]);

            return redirect()->back()
                             ->with('success', 'Status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                             ->with('error', 'There was an error. Please try again.');
        }
    }
}
