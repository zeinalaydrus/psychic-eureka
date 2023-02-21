@extends('admin.layouts.master')
@section('content')
    <div class="modal fade" id="kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalAdd">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin/user/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nis</label>
                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="nis" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Alamat</label>
                            <textarea class="form-control" id="formGroupExampleInput" placeholder="" name="alamat" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                name="kelas" required>
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

    @foreach ($users as $user)
        <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalAdd">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/user/edit/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                                <input type="text" value="{{ $user->fullname }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="fullname" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Username</label>
                                <input type="text" value="{{ $user->username }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nis</label>
                                <input type="number" value="{{ $user->nis }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="nis" required>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Alamat</label>
                                <textarea class="form-control" id="formGroupExampleInput" placeholder="" name="alamat" required>{{ $user->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Kelas</label>
                                <input type="text" value="{{ $user->kelas }}" class="form-control"
                                    id="formGroupExampleInput" placeholder="" name="kelas" required>
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

    @foreach ($users as $user)
        <div class="modal fade" id="modalVerif{{ $user->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h2 class="modal-title" style="color: white">Verfikasi</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mx-5">
                        <span class="warning">
                            {{-- <img src="assets/images/warning.png"> --}}
                        </span>
                        <h2 style="text-align: center">Apakah kamu yakin ingin Memverfikasi user ini? </h2>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ url('admin/user/verif/' . $user->id) }}" method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $user->verif }}" name="verif">
                            <button type="submit"
                                class="btn btn-primary">yakin
                            </button>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($users as $user)
        <div class="modal fade" id="modalDelete{{ $user->id }}" tabindex="-1" aria-hidden="true">
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
                        <form action="{{ url('admin/user/delete/' . $user->id) }}" method="POST">
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
                    <h1>User</h1>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kategori">Tambah +</button>
                </div>
            </div>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Nis</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Kode</th>
                        <th>Verif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->nis }}</td>
                            <td>{{ $user->kelas }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->kode }}</td>
                            <td> 
                                <button class="btn btn-{{ $user->verif == 'terverifikasi' ? 'success' : 'danger'}}" data-bs-toggle="modal"
                                    data-bs-target="#modalVerif{{ $user->id }}">{{ $user->verif }}</button>
                            </td>
                            <td> <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalDelete{{ $user->id }}">Hapus</button>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $user->id }}">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
