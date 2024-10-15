<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\users_registration;
use App\Models\pending_request;
use Illuminate\Support\Facades\View;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\completed_request;


class AdminController extends Controller
{
    public function admindashboard(){
        // Fetch user data where the username is 'admin'
        $adminUser = users_registration::where('username', 'admin')->first();
        return view('admin.admindashboard', compact('adminUser'));
    }

    public function adminviewrequest(){
        // Fetch all pending requests
        $pendingRequests = pending_request::all();
        return view('admin.admin_viewrequest', compact('pendingRequests'));
    }
    

    public function admincompletedrequest(){
        $CompletedRequests = completed_request::all();
        return view('admin.admin_completedrequest', compact('CompletedRequests'));
    }

    public function viewattend(Request $request){
        // Get the request ID from the form submission
        $requestId = $request->input('request_id');
        
        // Retrieve the request details from the database
        $request = pending_request::findOrFail($requestId);

        // Pass the request details to the 'attend.blade.php' view
        return View::make('admin.attend')->with('request', $request);
    }

    public function updateRequestStatus($id, Request $request)
    {
        $status = $request->input('status');
    
        // Find the pending request by ID
        $pendingRequest = pending_request::findOrFail($id);
    
        if ($status === 'Done') {
            // Move the data to the completed_request table
            completed_request::create([
                'username' => $pendingRequest->username,
                'name' => $pendingRequest->name,
                'reqdate' => $pendingRequest->reqdate,
                'issue' => $pendingRequest->issue,
                'attended_by' => $request->input('attended_by'),
                'resloved_date' => $request->input('resloved_date'),
                'distribution' => $request->input('distribution'),
                'remark' => $request->input('remark')
            ]);
    
            // Delete the pending request
            $pendingRequest->delete();
    
            // Redirect to the admin view request page with success message
            return redirect()->route('adminviewrequest')->with('success', 'Request marked as Done.');
        } else {
            // Update the status to Pending
            $pendingRequest->update([
                'attended_by' => $request->input('attended_by'),
                'resloved_date' => $request->input('resloved_date'),
                'distribution' => $request->input('distribution'),
                'remark' => $request->input('remark')
            ]);
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'Request status updated to Pending.');
        }
    }

}