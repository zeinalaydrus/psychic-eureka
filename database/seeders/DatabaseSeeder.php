<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'AA001',
            'fullname' => 'Folkseesh',
            'nis' => '120318132',
            'username' => 'folksy',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'verif' => 'terverifikasi',
            'alamat' => 'jl. Batu Kinyang II',
            'role' => 'user',
            'join_date' => '2023-01-05 09:01:07'
        ]);

        User::create([
            'kode' => 'AA002',
            'fullname' => 'Aldey',
            'nis' => '120318132',
            'username' => 'aldy',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'verif' => 'terverifikasi',
            'alamat' => 'jl. Batu Paguyuban no.4',
            'role' => 'user',
            'join_date' => '2023-01-05 09:01:07'
        ]);


        User::create([
            'kode' => 'AA004',
            'fullname' => 'Muhammad Zein',
            'nis' => '120318132',
            'username' => 'zein',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'verif' => 'terverifikasi',
            'alamat' => 'jl. Batu Karang',
            'role' => 'user',
            'join_date' => '2023-01-05 09:01:07'
        ]);

        User::create([
            'kode' => 'ADM001',
            'fullname' => 'Admin',
            'nis' => '120318132',
            'username' => 'admin',
            'verif' => 'terverifikasi',
            'password' => bcrypt('password'),
            'kelas' => 'XII-RPL',
            'alamat' => 'jl. Batu Kinyang II',
            'role' => 'admin',
            'join_date' => '2023-01-05 09:01:07'
        ]);


        Kategori::create([
            'kode' => 'KT001',
            'nama' => 'Fiksi',
        ]);

        Kategori::create([
            'kode' => 'KT002',
            'nama' => 'Non Fiksi',
        ]);

        Kategori::create([
            'kode' => 'KT003',
            'nama' => 'Pengetahuan',
        ]);

        Penerbit::create([
            'kode' => 'PT001',
            'nama' => 'PT. Sejahtera',
            'verif' => 'Terverifikasi',
        ]);


        Penerbit::create([
            'kode' => 'PT002',
            'nama' => 'PT. Anugerah',
            'verif' => 'Belum Terverifikasi',
        ]);


        Penerbit::create([
            'kode' => 'PT003',
            'nama' => 'PT. Mutiara',
            'verif' => 'Terverifikasi',
        ]);

        Buku::create([
            'judul' => 'Dongeng kancil',
            'kategori_id' => '1',
            'penerbit_id' => '1',
            'pengarang' => 'Ibnu Fajar',
            'tahun_terbit' => '2001',
            'isbn' => '1893120',
            'j_buku_baik' => '20',
            'j_buku_rusak' => '18',
        ]);

        Buku::create([
            'judul' => 'Cara Cepat Kaya',
            'kategori_id' => '2',
            'penerbit_id' => '2',
            'pengarang' => 'Ahmad Rifai',
            'tahun_terbit' => '2011',
            'isbn' => '2837391',
            'j_buku_baik' => '20',
            'j_buku_rusak' => '10',
        ]);

        Buku::create([
            'judul' => 'Sang Pemimpi',
            'kategori_id' => '3',
            'penerbit_id' => '3',
            'pengarang' => 'Zulfikar naim',
            'tahun_terbit' => '2020',
            'isbn' => '1238990',
            'j_buku_baik' => '10',
            'j_buku_rusak' => '2',
        ]);

        // Peminjaman::create([
        //     'user_id' => '1',
        //     'buku_id' => '1',
        //     'tanggal_peminjaman' => '2023-01-30 09:00:24',
        //     'tanggal_pengembalian' => '2023-01-10 09:00:24',
        //     'kondisi_buku_saat_dipinjam' => 'rusak',
        //     'kondisi_buku_saat_dikembalikan' => 'rusak',
        // ]);

        // Peminjaman::create([
        //     'user_id' => '1',
        //     'buku_id' => '2',
        //     'tanggal_peminjaman' => '2023-01-30 09:00:24',
        //     'tanggal_pengembalian' => '2003-01-20 09:00:24',
        //     'kondisi_buku_saat_dipinjam' => 'rusak',
        //     'kondisi_buku_saat_dikembalikan' => 'baik',
        // ]);

        // Peminjaman::create([
        //     'user_id' => '3',
        //     'buku_id' => '3',
        //     'tanggal_peminjaman' => '2023-04-30 01:00:24',
        //     'tanggal_pengembalian' => '2013-01-10 19:00:24',
        //     'kondisi_buku_saat_dipinjam' => 'baik',
        //     'kondisi_buku_saat_dikembalikan' => 'baik',
        // ]);

        // Pesan::create([
        //     'penerima_id' => '1',
        //     'pengirim_id' => '1',
        //     'judul' => 'Reminder',
        //     'isi' => 'Tolong dikembalikan ya!',
        //     'status' => 'terkirim',
        //     'tanggal_kirim' => '2013-01-10 19:00:24',
        // ]);

        // Pesan::create([
        //     'penerima_id' => '2',
        //     'pengirim_id' => '2',
        //     'judul' => 'Reminder',
        //     'isi' => 'Selamat membaca ya!',
        //     'status' => 'terkirim',
        //     'tanggal_kirim' => '2014-02-16 19:00:24',
        // ]);

        // Pesan::create([
        //     'penerima_id' => '4',
        //     'pengirim_id' => '3',
        //     'judul' => 'Reminder',
        //     'isi' => 'harap dikembalikan segera ya!',
        //     'status' => 'terbaca',
        //     'tanggal_kirim' => '2011-04-11 19:00:24',
        // ]);

        Pemberitahuan::create([
            'isi' => 'Selamat Membaca Semuanya!',
            'status' => 'aktif',
        ]);

        Pemberitahuan::create([
            'isi' => 'Harap Tenang dan Tidak Berisik!',
            'status' => 'aktif',
        ]);

        Identitas::create([
            'nama_app' => 'E-Perpus SMKN 10',
            'alamat_app' => 'Jl. SMEAN 6 Jakarta Timur',
            'email_app' => 'smkn10@gmail.com',
            'nomor_hp' => '08632846238',
        ]);
    }
}
