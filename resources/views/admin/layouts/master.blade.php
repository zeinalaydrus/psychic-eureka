<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lsp Perpus</title>

    <link rel="stylesheet" href="/assets/css/main/app.css">

    <link rel="shortcut icon" href="/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="/assets/css/main/app.css" />
    <link rel="stylesheet" href="/assets/css/main/app-dark.css" />
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">
    <link rel="stylesheet" href="/assets/extensions/simple-datatables/style.css" />
    <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css" />
    <link rel="stylesheet" href="/assets/css/shared/iconly.css" />
</head>

<style>
    .badge-notification {
        position: absolute;
    }
</style>

<style>
    .choices__input {
        color: black;
    }
</style>
</head>

@php

use App\Models\Pesan;
$pesan = Pesan::where('penerima_id', Auth::user()->id)
    ->where('status', 'terkirim')
    ->get();
use App\Models\Pemberitahuan;
$pemberitahuan = Pemberitahuan::orderBy('id', 'DESC')
    ->take(5)
    ->get();

// use App\Models\Peminjaman;
// $peminjaman = Peminjaman::where('user_id'  $request->user_id)
// ->take()
// ->get();

@endphp

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">

                            <h2>Perpus</h2>
                        </div>
                        <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              aria-hidden="true"
                              role="img"
                              class="iconify iconify--system-uicons"
                              width="20"
                              height="20"
                              preserveAspectRatio="xMidYMid meet"
                              viewBox="0 0 21 21"
                            >
                              <g
                                fill="none"
                                fill-rule="evenodd"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              >
                                <path
                                  d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                  opacity=".3"
                                ></path>
                                <g transform="translate(-210 -1)">
                                  <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                  <circle cx="220.5" cy="11.5" r="4"></circle>
                                  <path
                                    d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"
                                  ></path>
                                </g>
                              </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                              <input
                                class="form-check-input me-0"
                                type="checkbox"
                                id="toggle-dark"
                                style="cursor: pointer"
                              />
                              <label class="form-check-label"></label>
                            </div>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              aria-hidden="true"
                              role="img"
                              class="iconify iconify--mdi"
                              width="20"
                              height="20"
                              preserveAspectRatio="xMidYMid meet"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="currentColor"
                                d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"
                              ></path>
                            </svg>
                          </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Main Menu</li>



                        <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <a href="{{ route('admin/dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-grid-3x3-gap-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-item {{ request()->is('admin/buku*', 'admin/penerbit*', 'admin/kategori*') ? 'active' : '' }} has-sub">
                            <a href="{{ url('data-master') }}" class='sidebar-link'>
                                <i class="bi bi-collection"></i>
                                <span>Katalog Buku</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/buku') ? 'active' : '' }}">
                                    <a href="{{ route('admin/buku') }}" class='sidebar-link'>
                                        <i class="bi bi-journal"></i>
                                        <span>Buku</span>
                                    </a>
                                </li>

                                {{-- <li class="submenu-item {{ request()->is('admin/penerbit') ? 'active' : '' }}">
                                    <a href="{{ route('admin/penerbit') }}" class='sidebar-link'>
                                        <i class="bi bi-award"></i>
                                        <span>Penerbit</span>
                                    </a>
                                </li>

                                <li class="submenu-item {{ request()->is('admin/kategori') ? 'active' : '' }}">
                                    <a href="{{ route('admin/kategori') }}" class='sidebar-link'>
                                        <i class="bi bi-collection"></i>
                                        <span>Kategori</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        <li
                            class="sidebar-item {{ request()->is('admin/admin*', 'admin/user*') ? 'active' : '' }} has-sub">
                            <a href="{{ url('data-master') }}" class='sidebar-link'>
                                <i class="bi bi-collection"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/user') ? 'active' : '' }}">
                                    <a href="{{ route('admin/user') }}" class='sidebar-link'>
                                        <i class="bi bi-person"></i>
                                        <span>User</span>
                                    </a>
                                </li>


                                <li class="submenu-item {{ request()->is('admin/admin') ? 'active' : '' }}">
                                    <a href="{{ route('admin/admin') }}" class='sidebar-link'>
                                        <i class="bi bi-person"></i>
                                        <span>Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/laporan') ? 'active' : '' }}">
                            <a href="{{ route('admin/laporan') }}" class='sidebar-link'>
                                <i class="bi bi-book"></i>
                                <span>Laporan Perpustakaan</span>
                            </a>
                        </li>


                        <li class="sidebar-title">Lain-lain</li>

                        <li
                        class="sidebar-item {{ Request::is('admin/pesan/masuk*', 'admin/pesan/terkirim*') ? 'active' : '' }} has-sub">
                        <a href="{{ url('/admin/pesan') }}" class='sidebar-link'>
                            <i class="bi bi-envelope"></i>
                            <span>Pesan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ url('/admin/pesan/masuk') }}">Pesan Masuk</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{ url('/admin/pesan/terkirim') }}">Pesan Terkirim</a>
                            </li>
                        </ul>
                    </li> 

                        <li class="sidebar-item {{ request()->is('admin/pemberitahuan') ? 'active' : '' }}">
                            <a href="{{ route('admin/pemberitahuan') }}" class='sidebar-link'>
                                <i class="bi bi-megaphone"></i>
                                <span>Pemberitahuan</span>
                            </a>
                        </li>

                        <li class="sidebar-item {{ request()->is('admin/identitas') ? 'active' : '' }}">
                            <a href="{{ route('admin/identitas') }}" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Identitas</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Lanjutan</li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                    class="bi bi-box-arrow-left"></i><span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-2'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-envelope bi-sub fs-4"></i>
                                        <span class="badge badge-notification bg-danger">

                                            {{ count($pesan) }}
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        @php
                                            $pesans = \App\Models\Pesan::where('status', 'terkirim')
                                                ->where('pengirim_id', '!=', Auth::user()->id)
                                                ->where('penerima_id', Auth::user()->id)
                                                ->orderBy('created_at', 'desc')
                                                ->get();
                                        @endphp

                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        @foreach ($pesan as $p)
                                            <li>
                                                <form action="{{ Auth::user()->role == 'user' ? route('user.ubah_status') : route('admin.ubah_status') }}" method="POST">
                                                    @csrf <button class="dropdown-item" type="submit"> <input
                                                            type="hidden" name="id"
                                                            value="{{ $p->id }}">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <div class="user-img d-flex align-items-center">
                                                                    <div class="avatar avatar-lg"> <img
                                                                            src="/assets/images/faces/1.jpg">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col ms-2">
                                                                <p class="mb-0 font-bold">
                                                                    {{ $p->pengirim->username }}</p>
                                                                <p class="mt-0 mb-0 font-thin text-sm">
                                                                    {{ $p->isi }}</p>
                                                            </div>
                                                        </div>
                                                    </button> </form>
                                            </li>
                                        @endforeach

                                        @if (count($pesan) == 0)
                                            <li><a class="dropdown-item" href="#">
                                                    No New Mail
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifications</h6>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-primary">
                                                    <i class="bi bi-cart-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Successfully check out</p>
                                                    <p class="notification-subtitle font-thin text-sm">Order ID #256
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-file-earmark-check"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <p class="text-center py-2 mb-0"><a href="#">See all
                                                    notification</a></p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ \Auth::user()->fullname }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{ \Auth::user()->role }}</p>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ \Auth::user()->username }} </h6>
                                    </li>
                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                        class="bi bi-box-arrow-left me-2 "></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/assets/js/pages/simple-datatables.js"></script>

</body>

</html>
