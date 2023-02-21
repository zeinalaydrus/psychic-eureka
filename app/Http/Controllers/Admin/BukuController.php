<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        $kategoris = Kategori::all();
        $penerbits = Penerbit::all();

        return view('admin.buku', compact('bukus', 'kategoris', 'penerbits'));
    }

    public function create(Request $request)
    {
        $buku = Buku::create(
            $request->all()
        );
        if ($request->hasFile('foto')) {
            $destination = 'public/foto';
            $foto = $request->file('foto');
            $foto_name = $foto->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination, $foto_name);

            $buku->update([
                'foto' => $foto_name
            ]);
        }
        if ($buku) {
            return redirect()->route('admin/buku')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/buku')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data');
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());

        if ($request->hasFile('foto')) {
            $destination = 'public/foto';
            $foto = $request->file('foto');
            $foto_name = $foto->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination, $foto_name);

            $buku->update([
                'foto' => $foto_name
            ]);
        }

        if ($buku) {
            return redirect()->route('admin/buku')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/buku')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data');
    }

    public function destroy($id)
    {
        $buku =  Buku::find($id)->delete();
        if ($buku) {
            return redirect()->route('admin/buku')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menghapus Data');
        }
    }
}
