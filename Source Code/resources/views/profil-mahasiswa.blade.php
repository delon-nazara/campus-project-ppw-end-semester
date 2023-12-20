@extends('layout')

@section('content')
    <div class="container">

        <h2 class="text-center mt-5">Profil Mahasiswa</h2>

        <div class="row justify-content-center mt-5">
            <div class="card shadow-lg" style="width: 60rem">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-center border-end border-3">
                        <i class="bi bi-person-square" style="font-size: 10rem"></i>
                    </div>
                    <div class="col d-flex align-items-center ps-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    Nama <br>
                                    NIM <br>
                                    Semester <br>
                                    Jenis Kelamin <br>
                                    Email <br>
                                    Jurusan <br>
                                    Fakultas <br>
                                </div>
                                <div class="col">
                                    <span class="me-3">:</span> {{ $mahasiswa->nama }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->nim }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->semester }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->jenis_kelamin }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->email }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->jurusan->nama }} <br>
                                    <span class="me-3">:</span> {{ $mahasiswa->jurusan->fakultas->nama }} <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5"></div>

        <h2 id="akademik" class="text-center pt-5">Informasi Akademik Mahasiswa</h2>

        <div class="row justify-content-center my-5">
            <div class="col-11">
                <div class="card shadow">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 1 ? 'active' : '' }} {{ $mahasiswa->semester < 1 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=1#akademik">Semester 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 2 ? 'active' : '' }} {{ $mahasiswa->semester < 2 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=2#akademik">Semester 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 3 ? 'active' : '' }} {{ $mahasiswa->semester < 3 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=3#akademik">Semester 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 4 ? 'active' : '' }} {{ $mahasiswa->semester < 4 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=4#akademik">Semester 4</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 5 ? 'active' : '' }} {{ $mahasiswa->semester < 5 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=5#akademik">Semester 5</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 6 ? 'active' : '' }} {{ $mahasiswa->semester < 6 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=6#akademik">Semester 6</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 7 ? 'active' : '' }} {{ $mahasiswa->semester < 7 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=7#akademik">Semester 7</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $semester == 8 ? 'active' : '' }} {{ $mahasiswa->semester < 8 ? 'disabled' : '' }}"
                                    href="/mahasiswa/{{ $mahasiswa->nim }}?semester=8#akademik">Semester 8</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-5">
                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-success text-center">
                                <tr>
                                    <th class="col-2">Nomor</th>
                                    <th class="col">Mata Kuliah</th>
                                    <th class="col-2">SKS</th>
                                    <th class="col-2">Nilai</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($mahasiswa->jurusan->mataKuliah as $matkul)
                                    @if ($matkul->semester == $semester)
                                        <tr>
                                            <td class="border border-success-subtle text-center">{{ $number }}</td>
                                            <td class="border border-success-subtle ps-3">{{ $matkul->nama }}</td>
                                            <td class="border border-success-subtle text-center">{{ $matkul->sks }}</td>
                                            <td class="border border-success-subtle text-center">
                                                {{ $mahasiswa->nilai->where('mata_kuliah_id', $matkul->id)->first()->huruf ?? '-' }}
                                            </td>
                                        </tr>
                                        @php
                                            $number++;
                                        @endphp
                                    @endif
                                @endforeach
                                <tr class="">
                                    <td class="border border-success-subtle text-center fw-bold" colspan="2">Total</td>
                                    <td class="border border-success-subtle text-center fw-bold">{{ $totalSKS }}</td>
                                    <td class="border border-success-subtle text-center fw-bold">
                                        {{ number_format($totalIP, 2) }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mb-5 me-5">
            <a href="/mahasiswa" class="btn btn-success">Kembali ke Halaman Mahasiswa</a>
        </div>

    </div>
@endsection
