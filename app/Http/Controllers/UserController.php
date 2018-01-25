<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Post;
use App\Signup;

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
       $isDriver = false;
       if(isset($request['isDriver'])) $isDriver = true;
       
       $user = new User();
       
       $user->email = $email;
       $user->name = $name;
       $user->lastName = $lastName;
       $user->password = $password;
       $user->isDriver = $isDriver;
       
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
       public function getSignups()
    {
             $this->middleware('auth');
        $user =  Auth::user();
        $signups = Signup::where('user_id', '=', $user->id)->get();        
        
        return view('signups', ['signups'=> $signups]);
    }
       public function getPostSignups()
    {
             $this->middleware('auth');
        $user =  Auth::user();
        $signups =  Signup::join('posts', 'post_id', '=', 'posts.id')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->where('users.id', '=', $user->id)
                ->get();         
        return view('psotsignups', ['signups'=> $signups]);
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
        $fromadmin = false;
        if(!$user){ $user =  User::where('id',  $request['userId'])->first(); $fromadmin = true;}
        
        $old_name = $user->name;
        $old_lastname = $user->lastName;
        
        $user->name = $request['name'];
        $user->lastName = $request['lastName'];
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
        if(!$fromadmin){
        return redirect()->route('account');
        } else{
          return redirect()->route('admin.loggedin');  
        }
    }
    
    public function getUserProfilePicture($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
    
}