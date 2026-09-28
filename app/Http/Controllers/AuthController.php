<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registerPost(Request $request)
    {
        $request->validate([
            'role' => 'required|in:pembeli,penjual',
            'nama_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:155|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->id_user = 'USR-' . Str::random(8);
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->tgl_daftar = now();
        $user->status_user = 'aktif';
        $user->save();

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'penjual') {
                return redirect()->intended('/products');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
