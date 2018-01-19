<?php

namespace App\Http\Controllers;
use App\User;

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
        //$this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('admin', ['users'=> $users]);
    }
    
     public function getDeleteUser($user_id){
         $user = User::where('id', $user_id)->first();         
         
         $user->delete();
        return redirect()->route('admin')->with(['message' => 'Succesfully deleted']);        
    }
    
    public function getEditUser($user_id){
        $user = User::where('id', $user_id)->first();
        return view('account', ['user' => $user]);        
    }
    
}
