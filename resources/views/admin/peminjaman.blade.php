@extends('admin.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h1>Buku Yang Dipinjam</h1>
                </div>
            </div>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Kondisi Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamans as $key => $peminjaman)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $peminjaman->user->fullname }}</td>
                            <td>{{ $peminjaman->buku->judul }}</td>
                            <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                            <td>{{ $peminjaman->kondisi_buku_saat_dipinjam }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
