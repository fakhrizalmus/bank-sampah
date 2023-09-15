<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());
        $sampah = Sampah::orderByDesc('id_sampah')->get();
        return view('admin.sampah.index', compact('sampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'jenis_sampah' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,svg',
            'harga' => 'required'
        ]);
        $foto = $request->file('foto');
        // dd($foto);
        if ($foto == null) {
            $namaFoto = 'undraw_profile.svg';
        } else {
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('img', $namaFoto);
        }
        $data = ([
            'jenis_sampah' => $request->jenis_sampah,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
            'harga' => $request->harga
        ]);
        Sampah::create($data);
        return redirect('/a')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sampah $sampah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sampah $sampah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_sampah)
    {
        $sampah = Sampah::where('id_sampah', $id_sampah)->first();
        // dd($sampah);
        if ($sampah->foto != 'undraw_profile.svg') {
            unlink('storage/img/' . $sampah->foto);
        }
        Sampah::where('id_sampah', $id_sampah)->delete();
        return redirect('/a');
    }
}
