<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use validate;
use App\Models\User;
use Auth;
use App\Models\Role;
use Redirect;
use Hash;

class AuthController extends Controller
{
    public function signup(){
        return view('Admin.Auth.signup');  
    }

    public function regigster(Request $request){
        $checkloginStatus = User::where('email', $request['email'])->first();
      
        if (!empty($checkloginStatus)) {
            return redirect()->back()
                ->withErrors(['email' => "User Already Regigster!"]);
        }
        if($request['password'] == $request['confirmpass']){
            $user = User::create([
                'name' => $request['Fullname'],
                'phone_no' => $request['phone'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            if($request->user == '2'){
                $user->attachRole('2');
            }else{
                $user->attachRole('1');
            }
          
            return Redirect::to('/login');

        }else{
            return redirect()->back()
            ->withErrors(['password' => "Password Not Match !"]);
        }
            

    }
    public function login(){
        return view('Admin.Auth.login');
    }

    public function doLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $checkLogin = User::where('email', $request['email'])->first();
        if (empty($checkLogin)) {
            return redirect()->back()
                ->withErrors(['email' => "User not found.!"]);
        }

        $checkloginStatus = User::where('email', $request['email'])->where('status', 'active')->first();
        if (empty($checkloginStatus)) {
            return redirect()->back()
                ->withErrors(['email' => "User block by admin..!"]);
        }

        $logindetails = array(
            'email' => $request['email'],
            'password' => $request['password']
        );

        if (Auth::attempt($logindetails)) {
            if (Auth::user()->hasRole('user')) {
                return Redirect::to('/studentdash');
            }else{
                return Redirect::to('/');
            }
            // Auth::logout();
            // return redirect()->back()
            //     ->withErrors(['email' => "Only Admin Can Login Here..!"]);

        } else {
            return redirect()->back()
                ->withErrors(['email' => 'Invalid Login Details.']);
        }

    }

    public function lock(){
        session(['locked' => 'true']);
        return view('Admin.Auth.lock');
    }

    public function unLock(Request $request){
        $password = $request->password;

        $this->validate($request, [
            'password' => 'required|string',
        ]);

        if(\Hash::check($password, \Auth::user()->password)){
            $request->session()->forget('locked');
            return redirect('/');
        }

        return back()->withErrors(['password' => 'Password does not match. Please try again.']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->forget('locked');
        return Redirect::to('/login');
    }

    public function forget(){
        return view('Admin.Auth.forget');
    }

}