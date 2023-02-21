@extends('user.layouts.master')
@section('content')
    <div class="card shadow">
        <div class="container">
            <div class="card-header">
                <h3>Form Peminjaman</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user/submit_peminjaman') }}" class="form-group">
                    @csrf
                    <div class="mb-3">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggal_peminjaman" value="{{ date('Y-m-d') }}"
                            id="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Pilih Buku</label>
                        <select class="form-select" name="buku_id" id="">
                            <option value="" disabled selected>-- Pilih Opsi --</option>
                            @foreach ($bukus as $buku)
                                <option value="{{ $buku->id }}"
                                    {{ isset($buku_id) ? ($buku_id == $buku->id ? 'selected' : '') : '' }}>
                                    {{ $buku->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Kondisi Buku</label>
                        <select class="form-select" name="kondisi_buku_saat_dipinjam" id="">
                            <option value="" disabled selected>-- Pilih Opsi --</option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    <input type="hidden" name="user_id"  value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-primary">Select</button>
                </form>
            </div>
        </div>
    </div>
@endsection
