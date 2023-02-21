@extends('user.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
            @endif
            <div class="row">
                <div class="col-9">
                    <h1>Buku Yang Dipinjam</h1>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{ route('user/form_pinjam') }}">Pinjam</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Kondisi Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjamans as $key => $peminjaman)
                        <tr>
                            <td>{{ $key + 1 }}</td>
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
