@extends('layout')

@section('content')
    <div class="container">

        <h2 class="py-3">Database Mahasiswa</h2>

        @if (session()->has('tambah'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('tambah') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('edit'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('edit') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('hapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('hapus') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="/kelola-data/mahasiswa/tambah" class="btn btn-success px-3">
            <i class="bi bi-plus-circle pe-2"></i> Tambahkan Data Mahasiswa Baru
        </a>

        <div class="row align-items-center mb-3">
            <div class="col-4">
                <form id="form" action="/kelola-data/mahasiswa" method="GET">

                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <select id="sort" class="form-select border border-success" aria-label="Default select example"
                        name="sort_by">
                        <option selected>Urutkan Berdasarkan</option>
                        <option value="nama">Nama (Default)</option>
                        <option value="nim">NIM</option>
                        <option value="jurusan">Jurusan</option>
                    </select>

                </form>
            </div>

            <div class="col-5 ms-auto">
                <form action="/kelola-data/mahasiswa" method="GET">

                    @if (request('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif

                    <div class="input-group my-3 border border-success rounded">
                        <input type="text" class="form-control" name="search" placeholder="Ketik Pencarian ..."
                            value="{{ request('search') }}">
                        <button class="btn btn-success px-4" type="submit">Cari</button>
                    </div>

                </form>
            </div>
        </div>

        @if ($mahasiswa->count())
            <table class="table table-striped table-bordered table-hover align-middle">

                <thead class="table-success text-center">
                    <tr>
                        <th class="col-1">Nomor</th>
                        <th class="col-4">Nama</th>
                        <th class="col-2">NIM</th>
                        <th class="col-3">Jurusan</th>
                        <th class="col-2">Kelola Data</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $number = $mahasiswa->firstItem();
                    @endphp
                    @foreach ($mahasiswa as $mhs)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="ps-3">{{ $mhs->nama }}</td>
                            <td class="text-center">{{ $mhs->nim }}</td>
                            <td class="text-center">{{ $mhs->jurusan->nama }}</td>
                            <td class="text-center">
                                <a href="/kelola-data/mahasiswa/edit/{{ $mhs->nim }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Hapus
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Penghapusan
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin ingin menghapus data mahasiswa ini? <br>
                                                Data yang sudah dihapus tidak dapat dikembalikan!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">
                                                    <a href="/kelola-data/mahasiswa/hapus/{{ $mhs->nim }}"
                                                        class="text-decoration-none text-light">Hapus</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $number++;
                        @endphp
                    @endforeach
                </tbody>

            </table>

            <div class="row mt-5 mb-4">
                <div class="col">
                    <a href="/kelola-data" class="btn btn-success">Kembali ke Halaman Kelola Data</a>
                </div>
                <div class="col d-flex justify-content-end">
                    {{ $mahasiswa->appends([
                            'sort_by' => $sort_by,
                            'search' => $search,
                        ])->links() }}
                </div>
            </div>
        @else
            <h2 class="text-center" style="margin-top: 6rem">Tidak ada data yang ditemukan.</h2>
        @endif

    </div>

    <script>
        document.getElementById('sort').addEventListener('change', function() {
            document.getElementById('form').submit();
        });
    </script>
@endsection
