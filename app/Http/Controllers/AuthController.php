<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function verify(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('home.index'));
        }

        return redirect(route('auth.index'))->with('pesan', 'Email atau Password Salah!');
    }

    public function index()
    {
        if (Auth::check()) {
            // Pengguna sudah login, arahkan ke halaman sesuai role
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard.index');
                case 'penulis':
                    return redirect()->route('penulis.dashboard.index');
                case 'user':
                    return redirect()->route('user.dashboard.index');
                default:
                    return redirect()->route('home.index');
            }
        }

        // Jika belum login, tampilkan halaman login
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
            'role' => 'required|in:user,penulis',
        ], [
            'password.min' => 'Password minimal 8 karakter.',
            'password_confirmation.same' => 'Password tidak sesuai.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('auth.index')->with('success', 'Berhasil Registrasi, Silahkan Login!');
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('home.index'));
    }
}
