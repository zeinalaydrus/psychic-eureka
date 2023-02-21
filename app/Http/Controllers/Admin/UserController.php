<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeUnit\FunctionUnit;

class UserController extends Controller
{
    public function user()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.user', compact('users'));
    }

    public function create(Request $request)
    {
        $count = User::where('role', 'user')->count();
        $kode = 'AA00' . ($count + 1);

        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'role' => 'user',
            'kode' => $kode,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('admin/user')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/user')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id)->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('admin/user')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengubah Data');
        }
        return redirect()->route('admin/user')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengubah Data');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin/user')
            ->with('status', 'success')
            ->with('message', 'Berhasil Menghapus Data');
    }

    public function verif($id, Request $request){
        $anggota = User::where('id', $id)->first();

        if ($anggota != null) {

            if ($request->verif == 'belum terverif') {
                $anggota->update([
                    'verif' => 'terverifikasi'
                ]);
            }

            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Memverifikasi User!");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal Memverifikasi User!");
    }
}
