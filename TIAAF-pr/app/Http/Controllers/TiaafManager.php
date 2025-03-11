<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Session;
//use App\Models\User;
//
//class TiaafManager extends Controller
//{
//    function login(){
//        return view('login');
//    }
//    function registration(){
//        return view('registration');
//    }
//
////checks weather email & password are present or not
//    function loginPost(Request $request){
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required'
//        ]);
//
//        $credentials= $request->only('email', 'password');
//        if(Auth::attempt($credentials)){
//            return redirect()->intended(route('home'));
//        }
//        return redirect(route('login'))->with("error", "Invalid login details");
//    }
//
//    function loginPost(Request $request) {
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required'
//        ]);
//
//        $credentials = $request->only('email', 'password');
//        if (Auth::attempt($credentials)) {
//            // Redirect to the dashboard after login
//            return redirect()->intended(route('dashboard'));
//        }
//
//        return redirect()->route('login')->with("error", "Invalid login details");
//    }
//
//
//
//    function registrationPost(Request $request){
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
////            'password' => 'required',
//        ]);
//
//        $data['name'] = $request->name;
//        $data['email'] = $request->email;
//        $data['password'] = Hash::make($request->password);
//        $user = User::Create($data);
//        if(!$user){
//            return redirect(route('registration'))->with("error", "Registration failed");
//        }
//        return redirect(route('login'))->with("success", "Registration sucess, login to access the app");
//    }}


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class TiaafManager extends Controller
{
    function login()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    // Function to handle login request
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Redirect to the dashboard after login
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('login')->with("error", "Invalid login details");
    }

    // Function to handle registration request
    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required' // Password should not be commented out
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed");
        }

        return redirect(route('login'))->with("success", "Registration successful, login to access the app");
    }
}
