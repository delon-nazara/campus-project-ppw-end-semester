@extends('layout')

@section('content')
    <div class="container">

        <h2 class="py-3">Database Mahasiswa <br>{{ $heading }}</h2>

        <div class="row align-items-center mb-3">
            <div class="col-4">
                <form id="form" action="/mahasiswa" method="GET">

                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if (request('fakultas'))
                        <input type="hidden" name="fakultas" value="{{ request('fakultas') }}">
                    @endif
                    @if (request('jurusan'))
                        <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
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
                <form action="/mahasiswa" method="GET">

                    @if (request('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif
                    @if (request('fakultas'))
                        <input type="hidden" name="fakultas" value="{{ request('fakultas') }}">
                    @endif
                    @if (request('jurusan'))
                        <input type="hidden" name="jurusan" value="{{ request('jurusan') }}">
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
                        <th class="col-2">Detail</th>
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
                            <td class="text-center"><a href="/mahasiswa/{{ $mhs->nim }}" class="btn btn-success btn-sm">Lihat
                                    Selengkapnya</a></td>
                        </tr>
                        @php
                            $number++;
                        @endphp
                    @endforeach
                </tbody>

            </table>

            <div class="d-flex justify-content-end mt-5 mb-4">
                {{ $mahasiswa->appends([
                        'sort_by' => $sort_by,
                        'search' => $search,
                        'fakultas' => $fakultas,
                        'jurusan' => $jurusan,
                    ])->links() }}
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
