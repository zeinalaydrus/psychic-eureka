<!DOCTYPE html>
<html>

<head>
    <title>Laporan Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .left {
            margin-left: 50px;
        }

        table {
            font-family: arial, sans-serif;
            font-size: 10px;
            border-collapse: collapse;
            width: 85%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>

    <div class="row">
        <div style="position:relative;">
            <div style="position:absolute; left:37px; top:15px; width:200px;">
                {{-- <img src="{{ public_path('assets/images/faces/1.jpg') }}" width="35%" class="" alt="Logo-Intek"
            style="border-radius:50%" /> --}}

                {{-- {{ public_path($identitas->foto) }} --}}
                <img src="#" width="35%" class="" alt="PHOTO" style="border-radius:50%" />
            </div>
            <div style="margin-left:11px; text-align:center; font-family:sans-serif">
                <h2>{{ $identitas->nama_app }}</h2>
                <p style="font-size: 11px">
                    {{ $identitas->alamat_app }}
                    <br>
                    {{ $identitas->email_app }}
                    <br>
                    {{ $identitas->nomor_hp }}
                </p>
            </div>
        </div>

        <hr>
        <br />

        <h5 style="text-align: center; font-family:sans-serif;">Laporan Peminjaman
            Buku</span>
        </h5>

        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->user->username }}</td>
                        <td>{{ $p->buku->judul }}</td>
                        <td>{{ $p->tanggal_peminjaman }}</td>
                        <td>{{ $p->tanggal_pengembalian }}</td>
                        <td>{{ $p->kondisi_buku_saat_dipinjam }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

</body>

</html>
