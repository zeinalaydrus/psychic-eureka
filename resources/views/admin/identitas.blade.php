@extends('admin.layouts.master')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
        @endif
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card shadow px-3 py-4">
                <div class="card">
                    <div class="card-head">
                        <h1>Identitas Applikasi</h1>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('admin/identitas/update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <table class="table table-striped table-bordered">
                                @foreach ($identitases as $identitas)
                                    <tr>
                                        <th>Foto</th>
                                        <td>
                                            <input class="form-control" type="file" name="foto">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td><input type="text" class="form-control" name="nama_app"
                                                value="{{ $identitas->nama_app }}" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>
                                            <textarea class="form-control" name="alamat_app">{{ $identitas->alamat_app }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input type="text" class="form-control" name="email_app"
                                                value="{{ $identitas->email_app }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>No Telpon</th>
                                        <td><input type="number" class="form-control" name="nomor_hp"
                                                value="{{ $identitas->nomor_hp }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card shadow px-3 py-4">
                <div class="card">
                    <div class="card-head">
                        <h3>Profil Saya</h3>
                    </div>
                    <div class="card-body">
                        <img class="mb-5 rounded-circle" height="150" width="150"
                            src="{{ '/storage/foto/' . $identitas->foto }}" alt="">
                        <p>
                            <b>Kode Applikasi: {{ $identitas->nama_app }}</b>
                        </p>
                        <p>
                            <b>Alamat: {{ $identitas->alamat_app }}</b>
                        </p>
                        <p>
                            <b>Email: {{ $identitas->email_app }}</b>
                        </p>
                        <p>
                            <b>No Telpon: {{ $identitas->nomor_hp }}</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
