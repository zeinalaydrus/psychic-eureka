<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemberitahuans = Pemberitahuan::where('status', 'aktif')->get();
        $bukus  = Buku::all();
        $penerbits = Penerbit::all();
        $kategoris = Kategori::all();
        return view('user.dashboard', compact('pemberitahuans', 'bukus', 'penerbits', 'kategoris'));
    }
}
