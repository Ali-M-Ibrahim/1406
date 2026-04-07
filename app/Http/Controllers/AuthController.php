<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view("auth.register");
    }

    public function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);

        $row = new User();
        $row->name = $request->name;
        $row->password = Hash::make($request->password);
        $row->email = $request->email;
        $row->save();
        return "Ok user registered";

    }
    public function login(){
        return view("auth.login");
    }
    public function connect(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(Auth::user()->is_admin){
                return redirect()->route('page1');
            }else{
                return redirect()->route('home');
            }

        }

        return back()->withErrors(['email'=>'Wrong email or password']);

    }

    public function home(){

        if(Auth::check()){
            $user = Auth::user();
            $userId = Auth::id();
            return View('auth.home');
        }else{
            abort(404);
        }

    }

        public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}

