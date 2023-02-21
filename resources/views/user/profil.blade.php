@extends('user.layouts.master')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
        @endif
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card shadow px-3 py-4">
                <div class="card">
                    <div class="card-head">
                        <h1>Update Profile</h1>
                    </div>
                    <div class="card-body">
                        <form class="form form-vertical" action="{{ route('user/profil_update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Foto</th>
                                    <td>
                                        <input class="form-control" type="file" name="foto">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><input required type="text" class="form-control" name="fullname"
                                            value="{{ Auth::user()->fullname }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><input required type="text" class="form-control" name="username"
                                            value="{{ Auth::user()->username }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nis</th>
                                    <td><input required type="text" class="form-control" name="nis"
                                            value="{{ Auth::user()->nis }}"></td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td><input required type="text" class="form-control" name="kelas"
                                            value="{{ Auth::user()->kelas }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>
                                        <textarea class="form-control" name="alamat">{{ Auth::user()->alamat }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td><input required type="password" class="form-control" name="password"
                                            placeholder="Ubah Sandi">
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-primary" type="submit">Save</button>
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
                        
                        <img class="mb-5 rounded-circle" height="150" width="150" src="{{ Auth::user()->foto }}" alt="">
                        <p>
                            <b>Kode: {{ Auth::user()->kode }}</b>
                        </p>
                        <p>
                            <b>Nis: {{ Auth::user()->nis }}</b>
                        </p>
                        <p>
                            <b>Nama Lengkap: {{ Auth::user()->fullname }}</b>
                        </p>
                        <p>
                            <b>Nama Pengguna: {{ Auth::user()->username }}</b>
                        </p>
                        <p>
                            <b>Kelas: {{ Auth::user()->kelas }}</b>
                        </p>
                        <p>
                            <b>Alamat Lengkap: {{ Auth::user()->alamat }}</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
