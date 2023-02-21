<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('user.profil');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);
        $user = User::find(Auth::user()->id)->update($request->all());
        $user2 = User::find(Auth::user()->id)->update([
            "password" => Hash::make($request->password),
            "foto" => "/img/" . $imageName
        ]);


        if ($user && $user2) {
            return redirect()->back()
                ->with("status", "success")
                ->with("message", "Berhasil Mengupdate Profile");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal Mengupdate Profil");
    }
}
