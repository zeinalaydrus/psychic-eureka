@extends('admin.layouts.master')
@section('content')
    <div class="modal fade" id="buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdd">Tambah Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin/buku/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Upload Foto</label>
                            <input value="" type="file" class="form-control" id="formGroupExampleInput"
                                placeholder="" name="foto">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">judul</label>
                            <input value="" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="" name="judul" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="">
                                <option value="" disabled selected>-- Pilih Opsi --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="penerbit_id" id="">
                                <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                                <option value="" disabled selected>-- Pilih Opsi --</option>
                                @foreach ($penerbits as $penerbit)
                                    <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="pengarang" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="tahun_terbit" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Isbn</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="isbn" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Jumlah Buku Baik</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="j_buku_baik" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Jumlah Buku Rusak</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="j_buku_rusak" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @foreach ($bukus as $buku)
        <div class="modal fade" id="edit{{ $buku->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalAdd">Edit Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/buku/edit/' . $buku->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Upload Foto</label>
                                <input value="" type="file" class="form-control" id="formGroupExampleInput"
                                    placeholder="" name="foto" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">judul</label>
                                <input value="{{ $buku->judul }}" type="text" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="judul" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id" id="">
                                    <option value="{{ $buku->judul }}" disabled selected>-- Pilih Opsi --</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $buku->kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <select class="form-select" name="penerbit_id" id="">
                                    <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                                    <option value="{{ $buku->judul }}" disabled selected>-- Pilih Opsi --</option>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}"
                                            {{ $penerbit->id == $buku->penerbit->id ? 'selected' : '' }}>
                                            {{ $penerbit->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                                <input value="{{ $buku->pengarang }}" type="text" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="pengarang" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                                <input value="{{ $buku->tahun_terbit }}" type="number" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="tahun_terbit" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Isbn</label>
                                <input value="{{ $buku->isbn }}" type="number" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="isbn" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Jumlah Buku Baik</label>
                                <input value="{{ $buku->j_buku_baik }}" type="number" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="j_buku_baik" required>
                            </div>

                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Jumlah Buku Rusak</label>
                                <input value="{{ $buku->j_buku_rusak }}" type="number" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="j_buku_rusak" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdd">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin/buku/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">judul</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="judul" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="">
                                <option value="" disabled selected>-- Pilih Opsi --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <select class="form-select" name="penerbit_id" id="">
                                <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                                <option value="" disabled selected>-- Pilih Opsi --</option>
                                @foreach ($penerbits as $penerbit)
                                    <option value="{{ $penerbit->id }}">{{ $penerbit->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="pengarang" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="tahun_terbit" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Isbn</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="isbn" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Jumlah Buku Baik</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="j_buku_baik" required>
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Jumlah Buku Rusak</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="j_buku_rusak" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @foreach ($bukus as $buku)
        <div class="modal fade" id="modalDelete{{ $buku->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h2 class="modal-title" style="color: white">Delete</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-5">
                        <span class="warning">
                            {{-- <img src="assets/images/warning.png"> --}}
                        </span>
                        <h2 style="text-align: center"> Apakah kamu yakin ingin menghapus data ini? </h2>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/buku/delete/' . $buku->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if (session('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
    @endif
    <div class="card shadow px-3 py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h1>Buku</h1>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buku"><i
                            class="bx bx-list-plus"></i>Tambah +</button>
                </div>
            </div>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Foto</th>
                        <th>Judul Buku</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>Isbn</th>
                        <th>Jumlah Buku Baik</th>
                        <th>Jumlah Buku Rusak</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $key => $buku)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img class="mb-5" style="max-height: 100px" src="{{ '/storage/foto/' . $buku->foto }}"
                                    alt="">
                            </td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->kategori->nama }}</td>
                            <td>{{ $buku->penerbit->nama }}</td>
                            <td>{{ $buku->pengarang }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>{{ $buku->isbn }}</td>
                            <td>{{ $buku->j_buku_baik }}</td>
                            <td>{{ $buku->j_buku_rusak }}</td>
                            <td>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{ $buku->id }}">Hapus</button>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $buku->id }}">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
