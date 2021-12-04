<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/beranda');
        }
        return back()->with('failed', 'Login Failed!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function register(Request $request)
    {
        // dd($request->input());
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'email|Unique:users',
            'password' => 'required|min:8',
            'alamat' => 'required',
            'tanggal_lahir' => 'required'
        ], [
            'email.unique' => 'Email sudah terdaftar.',
            'name.required' => 'Nama wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Panjang password minimal 8.',
            'alamat.required' => 'Alamat wajib diisi.',
            'tanggal_lahir' => 'Tanggal lahir wajib diisi.'
        ]);
        if ($request->password != $request->konfirmasi_password) {
            $request->validate([
                'konfirmasi_password' => 'confirmed'
            ], [
                'konfirmasi_password.confirmed' => 'Konfirmasi password tidak cocok.'
            ]);
        }
        $validateData['role'] = "member";
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('status', 'Pendaftaran akun berhasil.');
    }
    public function ganti_password(Request $request)
    {
        $validateData = $request->validate([
            'password_sekarang' => 'required',
            'password' => 'required|min:8',
            'konfirmasi_password' => 'required'
        ]);
        if (Hash::check($request->password_sekarang, auth()->user()->password)) {
            if ($request->password != $request->konfirmasi_password) {
                $request->validate([
                    'konfirmasi_password' => 'confirmed'
                ], [
                    'konfirmasi_password.confirmed' => 'Konfirmasi password tidak cocok'
                ]);
            }
        } else {
            return redirect('/ganti-password')->with('failed', 'Password sekarang salah!');
        }

        if (Hash::check($request->password, auth()->user()->password)) {
            return redirect('/ganti-password')->with('failed', 'Password baru tidak boleh sama!');
        } else {
            User::where('id', auth()->user()->id)
                ->update([
                    'password' => Hash::make($validateData['password'])
                ]);
            return redirect('/ganti-password')->with('status', 'Ganti password berhasil.');
        }
    }
}
