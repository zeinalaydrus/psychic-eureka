<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    public function index()
    {
        $pemberitahuans = Pemberitahuan::all();
        return view('admin.pemberitahuan', compact('pemberitahuans'));
    }

    public function create(Request $request)
    {
        $pemberitahuan = Pemberitahuan::create($request->all());
        if ($pemberitahuan) {
            return redirect()->route('admin/pemberitahuan')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/pemberitahuan')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data!');
    }

    public function update(Request $request, $id)
    {
        $pemberitahuan = Pemberitahuan::find($id)->update($request->all());
        if ($pemberitahuan) {
            return redirect()->route('admin/pemberitahuan')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengubah Data');
        }
        return redirect()->route('admin/pemberitahuan')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengubah Data!');
    }


    public function destroy($id)
    {
        $pemberitahuan =  Pemberitahuan::find($id)->delete();

        if ($pemberitahuan) {
            return redirect()->route('admin/pemberitahuan')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menghapus Data');
        }
        return redirect()->route('admin/pemberitahuan')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menghapus Data!');
    }
}
