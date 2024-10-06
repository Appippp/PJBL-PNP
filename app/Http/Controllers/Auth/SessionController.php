<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.auth');
    }

    public function refreshCaptcha()
    {
        return response()->json([
            'captcha' => captcha_img('math'),
        ]);
    }

    public function loginProses(Request $request)
    {
        // Validasi input dari form login
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ], [
            'required' => ':attribute wajib diisi.',  // Pesan umum untuk validasi 'required'
            'min' => ':attribute harus memiliki minimal 6 karakter.',  // Pesan umum untuk validasi 'min'
            'captcha.captcha' => 'Kode :attribute tidak valid.',  // Pesan khusus untuk captcha
        ]);

        // Menyusun data yang akan digunakan untuk login
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];

        // Melakukan autentikasi user menggunakan Auth::attempt
        if (Auth::attempt($data)) {
            // Jika autentikasi berhasil
            $request->session()->regenerate();  // Regenerasi session untuk mencegah session fixation
            return redirect()->route('backsite.dashboard.index');  // Redirect ke dashboard atau halaman yang diinginkan
        } else {
            return redirect()->route('login')->withErrors(['password' => 'Username atau password salah!']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // Tambahkan flash message setelah logout
        return redirect()->route('login')->with('info', 'Anda telah logout.');
    }
}
