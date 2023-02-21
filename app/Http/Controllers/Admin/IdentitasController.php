<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IdentitasController extends Controller
{
    public function index()
    {
        $identitases = Identitas::all();
        return view('admin.identitas', compact('identitases'));
    }

    public function update(Request $request)
    {
        $identitas = Identitas::first();
        $identitas->update(
            $request->all()
        );

        if ($request->hasFile('foto')) {
            $destination = 'public/foto';
            $foto = $request->file('foto');
            $foto_name = $foto->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination, $foto_name);

            $identitas->update([
                'foto' => $foto_name
            ]);
        }

        if ($identitas) {
            return redirect()->route('admin/identitas')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengubah Data');
        }
        return redirect()->route('admin/identitas')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengubah Data');
    }
}
