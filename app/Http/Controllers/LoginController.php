<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users_registration;
use Hash;
use Session;

class LoginController extends Controller
{
    
    public function viewlogin(){
        return view('login.login');
    }

    public function viewregister(){
        return view('login.register');
    }

    public function viewresetPW(){
        return view('login.resetPW');
    }

    public function storeusers(Request $request){
        $request->validate([
            'username'=>'required|unique:users_registrations',
            'email'=>'required|email|unique:users_registrations',
            'password'=>'required|min:5|max:12',
        ]);

        $users_registration=new users_registration();
        $users_registration->username=$request->username;
        $users_registration->email=$request->email;
        $users_registration->password=Hash::make($request->password);
        $res=$users_registration->save();

        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Something worng');
        }
    }

    public function loginusers(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:12',
        ]);
    
        $user = users_registration::where('username', '=', $request->username)->first();
        if($user){
            if (Hash::check($request->password, $user->password)){
                if ($user->role === 'admin') {
                    // For admin user, redirect to admin dashboard with login ID
                $request->session()->put('loginId', $user->id); // Store login ID in session
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard route
                } else {
                    // Redirect regular user to user dashboard
                    $request->session()->put('loginId', $user->id);
                    return redirect('userdashboard');
                }
            } else {
                return back()->with('fail', 'Incorrect password.');
            }
        } else {
            return back()->with('fail', 'This user name is not registered.');
        }
    }
    

    public function viewserdashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data = users_registration::where('id', '=', Session::get('loginId'))->first();
       
    }
    return view('user.userdashboard',compact('data'));

}

public function logout(){
    if(Session::has('loginId')){
        Session::pull('loginId'); 

        return redirect('/');
    }
}
}