<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\historylogin;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class loginregis extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'homepage']);
    }

    public function register()
    {
        return view('user.sign_up');
    }
    public function Store(Request $request)
    {
        // dd($request->all()); 

        $rule = [
            'pekerjaan' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required|min:4',
            'foto_kta' => 'image|nullable|max:1999',
            'foto_profile' => 'image|nullable|max:1999',
            'alamat' => 'required',
            'nomor_keanggotaan' => 'required',
            'daerah' => 'required',
            'cabang' => 'required',
            'tempat_lahir' => 'required',
            'wilayah' => 'required',
            'tanggal_lahir' => 'required',
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $path = null;
        $fppath = null;

        if ($request->hasFile('foto_kta')) {
            $filenameWithExt = $request->file('foto_kta')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_kta')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('foto_kta')->storeAs('/photos', $fileNameToStore);
        }
        if ($request->hasFile('foto_profile')) {
            $filenameWithExt = $request->file('foto_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $fppath = $request->file('foto_profile')->storeAs('/photos', $fileNameToStore);
        }

        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'password' => Hash::make($request->password),
            'foto_kta' => $path,
            'foto_profile' => $fppath,
            'alamat' => $request->alamat,
            'nomor_keanggotaan' => $request->nomor_keanggotaan,
            'cabang' => $request->cabang,
            'tempat_lahir' => $request->tempat_lahir,
            'wilayah' => $request->wilayah,
            'daerah' => $request->daerah,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }


        return back()->withErrors(['username' => 'The provided credentials do not match our records'])->onlyInput('username');
    }


    public function login()
    {
        return view('user.sign_in');
    }

    //    public function authenticate(Request $request)
//     {
//         $credentials = $request->validate([
//             'username' => 'required',
//             'password' => 'required',
//         ]);

    //         if (Auth::attempt($credentials)) {
//             $user = Auth::user();

    //             if ($user->username === 'admint') {
//                 return view('admin.dashboard'); // Ganti 'admin.dashboard' dengan nama view untuk dashboard admin
//             }

    //             return redirect()->route('homepage'); // Ganti 'homepage' dengan rute untuk halaman beranda umum
//         }

    //         return back()->withErrors([
//             'username' => 'The provided credentials do not match our records',
//         ])->onlyInput('username');
//     }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Menyimpan history login setelah autentikasi berhasil
            $historyLogin = new historylogin();
            $historyLogin->user_id = $user->id;
            $historyLogin->timestamp = now(); // Gunakan waktu sekarang
            $historyLogin->user_agent = $request->header('User-Agent');
            $historyLogin->save();

            if ($user->username === 'admint') {
                return view('admin.dashboard'); // Ganti 'admin.dashboard' dengan nama view untuk dashboard admin
            }

            return redirect()->route('homepage'); // Ganti 'homepage' dengan rute untuk halaman beranda umum
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records',
        ])->onlyInput('username');
    }



    public function homepage()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('user.homepage2', compact('user'));
        }
        return redirect()->route('login')
            ->withErrors(['You are not allowed to access',])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess("You have logged out");
    }

}
