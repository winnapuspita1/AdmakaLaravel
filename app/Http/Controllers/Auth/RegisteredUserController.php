<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('super_admin.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomor_hp' => ['required', 'max:255', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:superadmin,admin,mahasiswa'],
        ],
            [
                'required' => 'Form Tidak Boleh Kosong!',
                'role.in' => 'Silahkan Pilih Role!',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // event(new Registered($user));
        //auto login user
        //Auth::login($user);

        $request->session()->flash('success', 'Berhasil Mendaftarkan Akun!!');

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $request->session()->flash('failed', 'Gagal Update Data!');
        if ($request->password !== null) {
            $request->validate([
                'id' => ['required', 'integer'],
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'string', 'email', 'max:255',
                ],
                'nomor_hp' => ['required', 'string'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'role' => ['required', 'in:superadmin,admin,mahasiswa'],
            ],
                [
                    'required' => 'Form Tidak Boleh Kosong!',
                    'role.in' => 'Silahkan Pilih Role!',
                    '*.unique' => 'Email Sudah Terdaftar Pada Akun Lain!',
                    'password.confirmed' => 'Konfirmasi Password Salah!',
                ]);

            $user = User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'nomor_hp' => $request->nomor_hp,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } else {
            $request->validate([
                'id' => ['required', 'integer'],
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($request->id),
                    'string', 'email', 'max:255',
                ],
                'nomor_hp' => ['required', 'string'],
                'role' => ['required', 'in:superadmin,admin,mahasiswa'],
            ],
                [
                    'required' => 'Form Tidak Boleh Kosong!',
                    'role.in' => 'Silahkan Pilih Role!',
                    '*.unique' => 'Email Sudah Terdaftar Pada Akun Lain!',
                ]
            );

            $user = User::where('id', $request->id)->update([
                'name' => $request->name,
                'nomor_hp' => $request->nomor_hp,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }

        // event(new Registered($user));
        //auto login user
        //Auth::login($user);
        $request->session()->forget('failed');
        $request->session()->flash('success', 'Berhasil Update Data Akun!!');

        return redirect()->back();
    }
}
