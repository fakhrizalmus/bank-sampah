<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'unique:' . User::class],
            'username' => 'required',
            'password' => 'required',
            'repeat_password' => 'required'
        ]);
        // dd($request->all());
        if ($request->password != $request->repeat_password) {
            return redirect('/register')->with('error', 'Repeat password salah!');
        }
        // dd(Hash::make($request->password));
        $buatUser = User::create([
            'email' => $request->email,
            'username' => 'Admin',
            'foto' => 'undraw_profile_2.svg',
            'password' => Hash::make($request->password),
        ]);
        // dd($buatUser);
        $u = User::orderBy('id', 'DESC')->first();
        // dd($u);
        $u->auth_groups()->attach(2, ['user_id' => $buatUser->id]);
        return redirect('/login')->with('success', 'Berhasil mendaftar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
