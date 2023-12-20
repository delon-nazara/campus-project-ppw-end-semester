@extends('layout')

@section('content')
    <div class="container pt-2">

        <h3>Selamat Datang Admin,</h3>
        <h4>di Pusat Informasi Akademik Mahasiswa.</h4>

        <div class="row gap-4" style="margin-top: 2.25rem">

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Beranda</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Kembali ke halaman beranda. Lihat menu yang tersedia dan
                            penjelasannya disini.
                        </p>
                        <div class="text-end">
                            <a href="/beranda" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Mahasiswa</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Lihat daftar nama mahasiswa yang sudah tersimpan pada pusat
                            database.
                        </p>
                        <div class="text-end">
                            <a href="/mahasiswa" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Lihat daftar nama mata kuliah yang sudah tersimpan
                            pada
                            pusat database.
                        </p>
                        <div class="text-end">
                            <a href="/mata-kuliah" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-5 mb-5 gap-4">

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Fakultas</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Lihat daftar nama fakultas yang sudah tersimpan
                            pada pusat
                            database.
                        </p>
                        <div class="text-end">
                            <a href="/fakultas" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Jurusan</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Lihat daftar nama jurusan yang sudah tersimpan pada
                            pusat
                            database.
                        </p>
                        <div class="text-end">
                            <a href="/jurusan" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-header text-center pt-3">
                        <h5>Kelola Data</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="card-text fst-italic">Kelola data mahasiswaa dan mata kuliah pada pusat database.
                        </p>
                        <div class="text-end">
                            <a href="/kelola-data" class="btn btn-success btn-sm mt-2">Kunjungi <i
                                    class="bi bi-box-arrow-up-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
