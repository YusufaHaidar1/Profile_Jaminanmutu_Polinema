<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login{
/**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $groups): Response
    {
        //Melakukan cek apakah sudah melakukan login, jika belum akan kembali ke halaman login
        if(!Auth::check()){
            return redirect('/login');
        }
        //Menyimpan data user pada variabel user
        $user = Auth::user();

        if ($user->id_group == $groups) {
            return $next($request);
        }

        //Jika tidak memiliki akses maka kembali ke halaman login
        return redirect('login')->with('error', 'Anda Tidak Memiliki Akses');
    }
}