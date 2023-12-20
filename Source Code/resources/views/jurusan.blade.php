@extends('layout')

@section('content')
    <div class="container pb-5">

        <h1 class="py-3 text-center">Database Jurusan</h1>

        <div class="row">
            <div class="col-6 mx-auto mb-3">
                <form id="form" action="/jurusan" method="GET">
                    <div class="input-group my-3 border border-success rounded">
                        <input type="text" class="form-control" name="search" placeholder="Ketik Pencarian ..."
                            value="{{ request('search') }}">
                        <button class="btn btn-success px-4" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($jurusan->count())
            <div class="row d-flex justify-content-center gap-5" style="margin-top: 2.25rem">

                @foreach ($jurusan as $jur)
                    <div class="col-5 mb-4">
                        <div class="card shadow p-2">

                            <div
                                class="card-body d-flex flex-column align-items-center justify-content-center text-center px-5 py-4">
                                <h4>Jurusan {{ $jur->nama }}</h4>
                                <h6 class="fst-italic mt-1">
                                    <a class="text-decoration-none"
                                        href="/mahasiswa?fakultas={{ $jur->fakultas->nama }}">Fakultas
                                        {{ $jur->fakultas->nama }}</a>
                                </h6>
                                {{-- </div> --}}
                                <hr class="my-3 border border-dark border-1" width="100%">
                                {{-- <div class="card-body p-4"> --}}
                                <div class="text-center my-2">
                                    <a href="/mahasiswa?jurusan={{ $jur->nama }}" class="btn btn-success">Kunjungi <i
                                            class="bi bi-box-arrow-up-right ms-1"></i></a>
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
