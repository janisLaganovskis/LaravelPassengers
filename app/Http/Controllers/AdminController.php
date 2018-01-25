<?php

namespace App\Http\Controllers;
use App\User;
use App\Admin;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             
        return view('admin-register');
    }
    
     public function getDeleteUser($user_id){
         // $this->middleware('auth:admin');
         $user = User::where('id', $user_id)->first();         
         
         $user->delete();
        return redirect()->route('admin')->with(['message' => 'Succesfully deleted']);        
    }
     public function getDashboard()
    {
         // $this->middleware('auth:admin');
          
         $users = User::all();        
        return view('admin', ['users'=> $users]);
    }
    
    public function getEditUser($user_id){
        // $this->middleware('auth:admin');
        $user = User::where('id', $user_id)->first();
        return view('account', ['user' => $user]);        
    }
    
    public function postSignUp(Request $request)
    {
        
        
       $this->validate($request, [
           'email' => 'required|email|unique:users',
           'name' => 'required|max:120',
           'last_name' => 'required|max:120',          
           'password' => 'required|confirmed|min:8'
       ]);
       
       $email = $request['email'];
       $name = $request['name']; 
       $lastName = $request['last_name'];
       $password = bcrypt($request['password']);
             
       
       $admin = new Admin();
       
       $admin->email = $email;
       $admin->name = $name;
       $admin->lastName = $lastName;
       $admin->password = $password;
       
       $admin->save();
       Auth::guard('admin')->login($admin);
       
        $users = User::all();
        
        return view('admin', ['users'=> $users]);
       
             
    }
    
}
