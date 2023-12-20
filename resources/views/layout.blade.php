<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success py-3 mb-4">
        <div class="container">
            <a class="navbar-brand fs-4" href="/"><i class="bi bi-mortarboard-fill me-3"></i>Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 1.1rem">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Beranda' ? 'active' : '' }}" href="/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Mahasiswa' ? 'active' : '' }} {{ $title == 'Profil Mahasiswa' ? 'active' : '' }}"
                            href="/mahasiswa">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Mata Kuliah' ? 'active' : '' }}" href="/mata-kuliah">Mata
                            Kuliah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Fakultas' ? 'active' : '' }}"
                            href="/fakultas">Fakultas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Jurusan' ? 'active' : '' }}" href="/jurusan">Jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1 {{ $title == 'Kelola Data' ? 'active' : '' }} {{ $title == 'Kelola Data Mahasiswa' ? 'active' : '' }} {{ $title == 'Kelola Data Mata Kuliah' ? 'active' : '' }}" href="/kelola-data">Kelola
                            Data</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="border border-0 bg-success text-light"><i
                                    class="bi bi-box-arrow-right me-1"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
