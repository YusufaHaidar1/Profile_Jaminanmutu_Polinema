<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user) {
            if($user->id_group == '1') {
                return redirect()->intended('admin');
            }
            else if($user->id_group == '2') {
                return redirect()->intended('member');
            }
        }
        return view('Login.signin');
    }

    public function proses_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            if($user->id_group == '1') {
                return redirect()->intended('admin');
            }
            else if($user->id_group == '2') {
                return redirect()->intended('member');
            }
            return redirect()->intended('/');
        }
        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Pastikan kalau username dan password sudah benar ya :)']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
