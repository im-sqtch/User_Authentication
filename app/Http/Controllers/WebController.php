<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\Webmail;
use Hash;
use Auth;

class WebController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }

    public function login_submit(Request $resquest)
    {
        $credentials = [
            'email' => $resquest->email,
            'password' => $resquest->password,
            'status' => 'Active'
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        else {
            return redirect()->route('login');
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function forget_password()
    {
        return view('forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $token = hash('sha256',time());

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            dd('Email not found');
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Webmail($subject, $message));

        echo 'Check your email';

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();
    }

    public function submition(Request $request)
    {
        $token = hash('sha256',time());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 'Pending';
        $user->token = $token;
        $user->save();

        $verification_link = url('registration/verify/'.$token.'/'.$request->email);
        $subject = 'Registration confirmation';
        $message = 'Please click on this link: <br>'.$verification_link;

        \Mail::to($request->email)->send(new Webmail($subject, $message));

        echo 'Email is sent successfully.';
    }

    public function resgistration_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();

        if(!$user)
        {
            return redirect()->route('login');
        }

        $user->status = 'Active';
        $user->token = '';
        $user->update();

        echo 'Registration successful.';
    }
}
