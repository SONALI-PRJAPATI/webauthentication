<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Authentication logic
        if (Auth::attempt($validated)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function showlogin(){
        return view("auth.login");
    }

    public function register(Request $request){
     $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'phone' => 'required|numeric|digits:10',]);

    // Create new user
    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt($validated['password']);
    $user->phone = $validated['phone'];

    $files = []; // Initialize an array to store filenames

    if ($request->hasFile('attachment')) { //It checks if any files are uploaded.
        foreach ($request->file('attachment') as $file) { //It loops through each uploaded file,
            $name = time() . '.' . $file->getClientOriginalName();// generates a unique filename, 
            $file->move(public_path('uploads'), $name);//moves the file to the uploads directory, 
            $files[] = $name; // Add filename to the array
        }
        $user->attachment = json_encode($files); // Store filenames as JSON
    }

    $user->save();

    Auth::login($user); // Log in the user after registration

    return redirect()->route('profile');
  }

    public function showregistration(){
        return view('auth.register');
    }

    public function profile(){
        $user = Auth::user();
        
        if ($user) {
            return view('profile', compact('user'));
        }
        
        return redirect()->route('login');
    }


     
    public function dashboard(){
        $users = DB::table('users')->get();
    
        foreach ($users as $user) {
            $user->attachment = $user->attachment ? json_decode($user->attachment, true) : [];
        }
    
        return view('dashboard', compact('users'));
    }
    

    public function edit(){
        $user = Auth::user();  
         return view('edit', compact('user'));
    }
    
    public function update(Request $request){
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|numeric|digits:10',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();
    $user->name = $validated['name'];
    $user->phone = $validated['phone'];

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $name);
        $user->attachment = json_encode([$name]); // Store as JSON array
    }

    $user->save();

    return redirect()->route('edit')->with('success', 'Profile updated successfully.');
}
  
public function reset(){
     return view('auth.reset'); 
}
   
function handleReset(Request $request){
    $validated = $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);
    $user = User::where('email',$request->email)->first(); //find user
    if($user){
        //update new password valid
        $user->password = Hash::make($validated['password']);
        $user->save();
    }
    return redirect()->route('login')->with('status', 'Passward updated successfully.');
}
}
