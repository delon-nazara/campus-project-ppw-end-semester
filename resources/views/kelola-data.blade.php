@extends('layout')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 30rem">
        <div class="col-7 px-4 py-5 rounded-5 shadow-lg">
            <h2 class="text-center pt-3 mb-4">Pilih Data yang Ingin Dikelola:</h2>
            <div class="d-flex align-items-center justify-content-center p-3">
                <a href="/kelola-data/mahasiswa"
                    class="text-decoration-none text-light btn btn-success px-5 py-4 fs-5 fst-italic fw-bold mx-4 rounded-4 shadow">Kelola
                    Data
                    <br>
                    Mahasiswa</a>
                <a href="/kelola-data/mata-kuliah"
                    class="text-decoration-none text-light btn btn-success px-5 py-4 fs-5 fst-italic fw-bold mx-4 rounded-4 shadow">Kelola
                    Data
                    <br>
                    Mata Kuliah</a>
            </div>
        </div>
    </div>
@endsection
