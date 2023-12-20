@extends('layout')

@section('content')
    <div class="container">

        <h2 class="py-3">Database Mata Kuliah</h2>

        <div class="row align-items-center mb-3">
            <div class="col-4">
                <form id="form" action="/mata-kuliah" method="GET">

                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <select id="sort" class="form-select border border-success" aria-label="Default select example"
                        name="sort_by">
                        <option selected>Urutkan Berdasarkan</option>
                        <option value="nama">Nama (Default)</option>
                        <option value="sks">SKS</option>
                        <option value="semester">Semester</option>
                        <option value="jurusan">Jurusan</option>
                    </select>

                </form>
            </div>

            <div class="col-5 ms-auto">
                <form action="/mata-kuliah" method="GET">

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

        @if ($mataKuliah->count())
            <table class="table table-striped table-bordered table-hover align-middle">

                <thead class="table-success text-center">
                    <tr>
                        <th class="col-1">Nomor</th>
                        <th class="col-4">Mata Kuliah</th>
                        <th class="col-1">SKS</th>
                        <th class="col-1">Semester</th>
                        <th class="col-4">Jurusan</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $number = $mataKuliah->firstItem();
                    @endphp
                    @foreach ($mataKuliah as $matkul)
                        <tr>
                            <td class="text-center">{{ $number }}</td>
                            <td class="ps-3">{{ $matkul->nama }}</td>
                            <td class="text-center">{{ $matkul->sks }}</td>
                            <td class="text-center">{{ $matkul->semester }}</td>
                            <td class="text-center">{{ $matkul->jurusan->nama }}</td>
                        </tr>
                        @php
                            $number++;
                        @endphp
                    @endforeach
                </tbody>

            </table>

            <div class="d-flex justify-content-end mt-5 mb-4">
                {{ $mataKuliah->appends([
                        'sort_by' => $sort_by,
                        'search' => $search,
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
