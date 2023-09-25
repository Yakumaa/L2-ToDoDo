<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
  function login(){
    return view('login');
  }

  function register(){
    return view('register');
  }

  function loginPost(Request $request){
    $request->validate([
      'email'=> 'required',
      'password'=> 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if(Auth::attempt($credentials)){
      return redirect()->intended(route('home'));
    }
    return redirect(route("login"))->with('error', 'login details are not valid');
  }

  function registerPost(Request $request){
    $request->validate([
      'name'=> 'required',
      'email'=> 'required|email|unique:users',
      'password'=> 'required',
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['password'] = Hash::make($request->password);

    $user = User::create($data);

    if(!$user){
      return redirect(route("register"))->with('error', 'Registration failed!');
    }
    return redirect(route("login"))->with('success', 'Registration success!');
  }

  function logout(){
    Session::flush();
    Auth:: logout();
    return redirect(route('login'));
  }
}
