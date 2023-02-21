<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.peminjaman.riwayat', compact('peminjamans'));
    }

    public function pinjam(Request $request)
    {
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        if ($request->kondisi_buku_saat_dipinjam == 'baik') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik - 1
            ]);
        }


        if ($request->kondisi_buku_saat_dipinjam == 'rusak') {
            $buku = Buku::where('id', $request->buku_id)->first();
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak - 1
            ]);
        }


        return view('user.peminjaman.form_peminjaman', compact('bukus', 'buku_id'));
    }

    public function form(Request $request)
    {
        $buku_id = $request->buku_id;
        $bukus = Buku::all();

        return view('user.peminjaman.form_peminjaman', compact('bukus', 'buku_id'));
    }

    public function submit(Request $request)
    {
        $cek = Peminjaman::where('user_id', Auth::user()->id)->where('buku_id', $request->buku_id)->where('tanggal_pengembalian', null)->first();
        if ($cek == null) {
            $peminjaman = Peminjaman::create($request->all());

            if ($peminjaman) {
                return redirect()->route('user/peminjaman')
                    ->with('status', 'success')
                    ->with('message', 'Berhasil Menambah Data');
            }
        }
        return redirect()->route('user/peminjaman')
            ->with('status', 'danger')
            ->with('message', 'Tidak bisa meminjam buku yang belum dikembalikan!');
    }


    public function peminjaman()
    {
        $peminjamans = Peminjaman::all();
        return view('admin.peminjaman', compact('peminjamans'));
    }
}
