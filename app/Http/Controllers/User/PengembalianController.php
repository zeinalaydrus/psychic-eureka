<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        $juduls =  Peminjaman::where('user_id', Auth::user()->id)->where('tanggal_pengembalian', null)->get();
        return view('user.pengembalian.form', compact('juduls'));
    }

    public function riwayat()
    {
        $pengembalian = Peminjaman::where('user_id', Auth::user()->id)->get();
        // dd($pengembalian);
        return view('user.pengembalian.riwayat', compact('pengembalian'));
    }

    public function store(Request $request)
    {
        $cek = Peminjaman::where('user_id', $request->user_id)
            ->where('buku_id', $request->buku_id)
            ->where('tanggal_pengembalian', null)
            ->first();

        $cek->update([
            'tanggal_pengembalian'  => $request->tanggal_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan
        ]);

        if ($request->kondisi_buku_saat_dikembalikan == 'baik') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1
            ]);

            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1
            ]);
            $cek->update([
                'denda' => 20000
            ]);
        }

        if ($cek->kondisi_buku_saat_dipinjam == 'rusak' && $request->kondisi_buku_saat_dikembalikan == 'rusak') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1
            ]);
            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'hilang') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $cek->update([
                'denda' => 50000
            ]);
        }

        if ($cek) {
            return redirect()->route('user/pengembalian_riwayat')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengembalikan Buku');
        }
        return redirect()->route('user/pengembalian_riwayat')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengembalikan Buku');
    }
}
