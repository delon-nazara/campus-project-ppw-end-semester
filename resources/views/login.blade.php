<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="d-flex align-items-center justify-content-center bg-success-subtle" style="height: 100vh">
    <div class="container p-5 rounded-5 bg-light shadow-lg" style="width: 40rem">

        <h3 class="text-center fst-italic">Selamat Datang di <br> Pusat Informasi Akademik Mahasiswa </h3>
        <h4 class="text-center mt-5 mb-4">Silahkan Login Terlebih Dahulu!</h4>

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert" style="width: 70%">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="/" method="POST" class="mx-auto" style="width: 70%">
            @csrf
            <div class="input-group mb-2 border border-success-subtle rounded shadow-sm">
                <span class="input-group-text bg-success-subtle"><i class="bi bi-person-circle"></i></span>
                <div class="form-floating border-start border-success-subtle">
                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                        id="floatingInputGroup1" placeholder="Username" name="username" value="{{ old('username') ?? '' }}">
                    <label for="floatingInputGroup1">Username</label>
                    @error('username')
                        <div class="invalid-feedback ms-2 mb-1">
                            Mohon input username yang benar!
                        </div>
                    @enderror
                </div>
            </div>
            <div class="input-group mb-3 border border-success-subtle rounded shadow-sm">
                <span class="input-group-text bg-success-subtle"><i class="bi bi-lock-fill"></i></span>
                <div class="form-floating border-start border-success-subtle">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        id="floatingInputGroup1" placeholder="Username" name="password">
                    <label for="floatingInputGroup1">Password</label>
                    @error('password')
                        <div class="invalid-feedback ms-2 mb-1">
                            Mohon input password yang benar!
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success shadow" style="width: 100%">Login</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
