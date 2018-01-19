<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
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
       
       $user = new User();
       
       $user->email = $email;
       $user->name = $name;
       $user->lastName = $lastName;
       $user->password = $password;
       
       $user->save();
       
       Auth::login($user);
       
       return redirect()->route('dashboard');       
    }
    
     public function postSignIn(Request $request)
    {
        $this->validate($request, [
           'email' => 'required',               
           'password' => 'required'

       ]);
       if( Auth::attempt(['email' => $request['email'], 'password' =>($request['password'])])){
           return redirect()->route('dashboard');
       }
       return redirect()->back();
    }    
    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
    
    public function getLogout()
    {
       Auth::logout();
       return redirect()->route('login');
    }   
    
     public function postSaveAccount(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|max:120',
           'lastName' => 'required|max:120'
        ]);

        $user = Auth::user();
        
        $old_name = $user->name;
        
        $user->name = $request['name'];
        $user->update();
        
        $file = $request->file('profile_picture');
        $filename = $request['name'] . '-' . $user->id . '.jpg';
        
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        
        $update = false;
        
        if (Storage::disk('local')->has($old_filename)) {
            $old_file = Storage::disk('local')->get($old_filename);
            Storage::disk('local')->put($filename, $old_file);
            $update = true;
        }
        
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        if ($update && $old_filename !== $filename) {
            Storage::delete($old_filename);
        }
        return redirect()->route('account');
    }
    
    public function getUserProfilePicture($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
    
}