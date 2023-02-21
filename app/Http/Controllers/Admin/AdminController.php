<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    public function index()
    {
        $identitas = Identitas::all();
        return view('admin.dashboard', compact('identitas'));
    }

    public function create(Request $request)
    {
        $count = User::where('role', 'admin')->count();
        $kode = 'ADM00' . ($count + 1);

        $admin = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'role' => 'admin',
            'kode' => $kode,
            'password' => Hash::make($request->password),
        ]);

        if ($admin) {
            return redirect()->route('admin/admin')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menambah Data');
        }
        return redirect()->route('admin/admin')
            ->with('status', 'danger')
            ->with('message', 'Gagal Menambah Data');
    }

    public function update(Request $request, $id)
    {
        $count = User::where('role', 'admin')->count();
        $kode = 'ADM00' . ($count + 1);

        $admin = User::find($id)->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'role' => 'admin',
            'kode' => $kode,
            'password' => Hash::make($request->password),
        ]);

        if ($admin) {
            return redirect()->route('admin/admin')
                ->with('status', 'success')
                ->with('message', 'Berhasil Mengubah Data');
        }
        return redirect()->route('admin/admin')
            ->with('status', 'danger')
            ->with('message', 'Gagal Mengubah Data');
    }

    public function destroy($id)
    {
        $admin = User::find($id)->delete();

        if ($admin) {
            return redirect()->route('admin/admin')
                ->with('status', 'success')
                ->with('message', 'Berhasil Menghapus Data');
        }
    }

    public function admin()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admin', compact('admins'));
    }
}
