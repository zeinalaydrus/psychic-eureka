@extends('user.layouts.master')
@section('content')
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
            @endif
            <div class="card-header">
                <h3>Pengembalian</h3>
            </div>

            <section class="section">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Kondisi Buku Saat Dikembalikan</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalian as $p)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ Auth::user()->fullname }}</th>
                                    <th>{{ $p->buku->judul }}</th>
                                    <th>{{ $p->tanggal_pengembalian }}</th>
                                    <th>{{ $p->kondisi_buku_saat_dikembalikan }}</th>
                                    <th>{{ $p->denda }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </section>
@endsection
