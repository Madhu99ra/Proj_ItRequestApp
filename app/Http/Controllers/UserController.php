<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users_registration;
use Illuminate\Support\Facades\Session;
use App\Models\pending_request;
use App\Models\completed_request;



class UserController extends Controller
{
   

   

    public function completeProfile(Request $request) {
        // Retrieve data from the form
        $data = $request->only(['username', 'email', 'name', 'department', 'post']);
    
        // Find the user record in the database
        $user = users_registration::findOrFail($request->user_id);
    
        // Update the user record with the new data
        $user->update($data);
    
        // Redirect back or to any other route as needed
        return redirect()->back()->with('success', 'Profile completed successfully!');
    }
    

    public function viewusername(){
        $data=array();
        if(Session::has('loginId')){
            $data = users_registration::where('id', '=', Session::get('loginId'))->first();
       
    }
    return view('user.request',compact('data'));

}


public function storependingreq(Request $request){
    $request->validate([
        'username'=>'required',
        'issue'=>'required',
    ]);

    $pending_request=new pending_request();
    $pending_request->username=$request->username;
    $pending_request->name = $request->name; 
    $pending_request->reqdate = $request->date;
    $pending_request->issue=$request->issue;
    $pending_request->attended_by=$request->attended_by;
    $pending_request->resloved_date=$request->resloved_date;
    $pending_request->distribution=$request->distribution;
    $pending_request->remark=$request->remark;
   
    $res=$pending_request->save();

    if($res){
        return back()->with('success','You have submited your request successfully');
    }else{
        return back()->with('fail','Something worng');
    }
}

public function viewrequest(){
    // Get the logged-in user's ID from the session
    $loggedInUserId = Session::get('loginId');
    
    // Find the user record in the database
    $user = users_registration::findOrFail($loggedInUserId);
    
    // Get the username of the logged-in user
    $username = $user->username;
    
    // Retrieve pending requests for the logged-in user
    $pendingRequests = pending_request::where('username', $username)->get();
    
    // Pass the data to the view
    return view('user.viewrequest', compact('pendingRequests'));
}

public function completedrequest(){
    // Get the logged-in user's ID from the session
    $loggedInUserId = Session::get('loginId');
    
    // Find the user record in the database
    $user = users_registration::findOrFail($loggedInUserId);
    
    // Get the username of the logged-in user
    $username = $user->username;
    
    // Retrieve pending requests for the logged-in user
    $CompletedRequests = completed_request::where('username', $username)->get();
    
    // Pass the data to the view
    return view('user.completedrequest', compact('CompletedRequests'));
}

}


