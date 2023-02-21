@extends('admin.layouts.master')
@section('content')
    <div class="modal fade" id="pemberitahuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdd">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin/pemberitahuan/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Isi</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="isi" required>
                        </div>
                        <div class="mb-3">
                            <label for="">status</label>
                            <select class="form-select" name="status" id="">
                                <option value="" disabled selected>-- Pilih Opsi --</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @foreach ($pemberitahuans as $pemberitahuan)
        <div class="modal fade" id="modalEdit{{ $pemberitahuan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEdit">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/pemberitahuan/edit/' . $pemberitahuan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Isi</label>
                                <input type="text" class="form-control" id="formGroupExampleInput"
                                    value="{{ $pemberitahuan->isi }}" placeholder="" name="isi" required>
                            </div>
                            <div class="mb-3">
                                <label for="">status</label>
                                <select class="form-select" name="status" id="">
                                    <option value="" disabled selected>-- Pilih Opsi --</option>
                                    <option value="aktif" {{ $pemberitahuan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ $pemberitahuan->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                                </select>
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

    @foreach ($pemberitahuans as $pemberitahuan)
        <div class="modal fade" id="modalDelete{{ $pemberitahuan->id }}" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ url('admin/pemberitahuan/delete/' . $pemberitahuan->id) }}" method="POST">
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
                    <h1>Pemberitahuan</h1>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pemberitahuan">Tambah
                        +</button>
                </div>
            </div>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemberitahuans as $key => $pemberitahuan)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pemberitahuan->isi }}</td>
                            <td><button class="btn btn-{{ $pemberitahuan->status == 'aktif' ? 'success' : 'danger'}}">{{ $pemberitahuan->status }}</button></td>
                            <td> <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{ $pemberitahuan->id }}">Hapus</button>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEdit{{ $pemberitahuan->id }}">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
