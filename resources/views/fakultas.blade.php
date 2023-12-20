@extends('layout')

@section('content')
    <div class="container pb-5">

        <h1 class="py-3 text-center">Database Fakultas</h1>

        <div class="row">
            <div class="col-6 mx-auto mb-3">
                <form id="form" action="/fakultas" method="GET">
                    <div class="input-group my-3 border border-success rounded">
                        <input type="text" class="form-control" name="search" placeholder="Ketik Pencarian ..."
                            value="{{ request('search') }}">
                        <button class="btn btn-success px-4" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($fakultas->count())
            <div class="row d-flex justify-content-center gap-5" style="margin-top: 2.25rem">

                @foreach ($fakultas as $fak)
                    <div class="col-5 mb-4">
                        <div class="card shadow">

                            <div class="card-header d-flex align-items-center justify-content-center text-center py-4 px-5"
                                style="height: 7rem">
                                <h4>Fakultas {{ $fak->nama }}</h4>
                            </div>

                            <div class="card-body p-4">

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item shadow">

                                        <h2 class="accordion-header">
                                            <button class="accordion-button bg-light" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-{{ $fak->id }}">
                                                Lihat Daftar Jurusan
                                            </button>
                                        </h2>

                                        <div id="collapse-{{ $fak->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @foreach ($fak->jurusan as $jurusan)
                                                    <a href="/mahasiswa?jurusan={{ $jurusan->nama }}"
                                                        class="text-decoration-none text-start lh-lg">Jurusan
                                                        {{ $jurusan->nama }} (S1)</a> <br>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="/mahasiswa?fakultas={{ $fak->nama }}" class="btn btn-success mt-4">Kunjungi
                                        <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <h2 class="text-center" style="margin-top: 6rem">Tidak ada data yang ditemukan.</h2>
        @endif

    </div>
@endsection
