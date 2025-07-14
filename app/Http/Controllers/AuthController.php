<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Berhasil Login');
        } else {
            return redirect()->route('login')->with("failed", 'Email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }

    public function settings()
    {
        return view('settings.index');
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required|min:8',
            'password_baru' => 'required|min:8|different:password_lama',
            'password_baru_confirmation' => 'required|same:password_baru',
        ]);

        $user = User::find(Auth::id());
        if (!Hash::check($request->password_lama, $user->password)) {
            return redirect()->back()->withErrors(['password_lama' => 'Password lama salah']);
        }

        $user->update(['password' => Hash::make($request->password_baru)]);

        return redirect()->route('settings')->with('success', 'Password berhasil diubah');
    }
}
