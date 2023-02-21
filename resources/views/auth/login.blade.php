<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="logo-login">
                        {{-- <img src="assets/images/burger.png" alt="icon"> --}}
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    @if (session('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }} </div>
                    @endif

                    <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-0 mt-5">
                            <input asp-for="username" type="username" name="username"
                                class=" form-control form-control-xl @error('username') is-invalid @enderror"
                                placeholder="Username">
                            <div class="form-control-icon">
                                <i class="ml-1 bi bi-person"></i>
                            </div>
                        </div>
                        @error('username')
                            <div class='mt-1'>
                                <span class=" text-danger" asp-validation-for="username">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                        <div class="form-group position-relative has-icon-left mt-4 mb-4 ">
                            <input type="password" name="password" id="password" class=" form-control form-control-xl"
                                placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                        </div>
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                    </form>
                </div>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Belum Memiliki Akun? <a href="{{ route('register') }}"
                            class="font-bold">Register</a>.</p>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
