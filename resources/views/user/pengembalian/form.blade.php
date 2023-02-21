@extends('user.layouts.master')
@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h4 class="card-title">Form Pengembalian Buku</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('user/pengembalian_form') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama Anggota</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" name="fullname"
                                    value="{{ Auth::user()->fullname }}" />
                            </div>
                            <div class="col-md-4">
                                <label>Judul Buku Yang Dikembalikan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select name="buku_id" id="" class="form-select">
                                    <option value="" disabled selected>-- Pilih Opsi --</option>
                                    @foreach ($juduls as $judul)
                                        <option value="{{ $judul->buku->id }}">{{ $judul->buku->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Tanggal Pengembalian</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                    name="tanggal_pengembalian" readonly />
                            </div>
                            <div class="col-md-4">
                                <label>Kondisi Buku Saat Dikembalikan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" name="kondisi_buku_saat_dikembalikan">
                                    <option value="" disabled selected>-- Pilih Opsi --</option>
                                    @foreach ($juduls as $form)
                                    <option {{ $form->kondisi_buku_saat_dipinjam == 'rusak' ? 'hidden' : '' }} value="baik">Baik</option>
                                    @endforeach
                                    <option value="rusak">Rusak</option>
                                    <option value="hilang">Hilang</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
