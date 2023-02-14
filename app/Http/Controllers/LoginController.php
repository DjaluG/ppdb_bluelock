<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Biodata;

class LoginController extends Controller
{
    public function login()
    {
        
        return view('forms.login');
    }

    public function inputLogin(Request $request)
    {
                // array ke2 sbgai custom msg
                $request->validate([
                    'email' => 'required|exists:users,email',
                    'password' => 'required',
                ]);
        
                $user = $request->only('email', 'password');
                // authentication
                if (Auth::attempt($user)) {
                    return redirect('/dashboard')->with('toast_success', 'Task Created Successfully!');;
                }else {
                    return redirect()->back()->with('error', 'Gagal login, silahkan cek dan coba lagi!');
                }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
