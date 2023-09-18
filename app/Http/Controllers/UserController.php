<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sampah;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sampah = Sampah::orderByDesc('id_sampah')->get();
        // dd(User::where('id', Auth::id())->first()->jenis);
        return view('user.index', compact('sampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_sampah)
    {
        $sampah = Sampah::where('id_sampah', $id_sampah)->first();
        // dd($sampah);
        return view('user.create', compact('sampah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'berat' => 'required',
            // 'total' => 'required'
        ]);
        if ($request->berat == 0) {
            return back()->with('error', 'Berat tidak boleh 0');
        }
        if ($request->berat < 0) {
            return back()->with('error', 'Berat tidak boleh kurang dari 0');
        }
        $data = ([
            'berat' => $request->berat,
            'total' => $request->berat * $request->harga,
            'sampah_id' => $request->id_sampah,
            'status' => 'active',
            'user_id' => auth()->id()
        ]);
        Transaksi::create($data);
        return redirect('/transaksi')->with('success', 'Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function transaksi()
    {
        $transaksi = Transaksi::with(['users', 'sampahs'])->where('transaksis.user_id', '=', Auth::id())->orderByDesc('transaksis.id_transaksi')->get();
        // dd($transaksi[0]->sampahs->lama_penyimpanan);
        foreach ($transaksi as $s) {
            $tglSekarang = date_create();
            $tglCreate = date_create($s->created_at);
            // dd(date_diff($tglCreate, $tglSekarang)->format('%a'));
            if (date_diff($tglCreate, $tglSekarang)->format('%a') >= $s->sampahs->lama_penyimpanan) {
                Transaksi::where('id_transaksi', '=', $s->id_transaksi)->update([
                    'status' => 'expired'
                ]);
            }
        };
        // dd($transaksi);
        return view('user.transaksi', compact('transaksi'));
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
