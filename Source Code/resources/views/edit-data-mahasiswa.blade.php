@extends('layout')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-8 card shadow-lg p-5">
                <h2 class="text-center mb-5">Edit Profil Mahasiswa</h2>
                <form action="/kelola-data/mahasiswa/edit" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $mahasiswa->id }}" name="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control border border-success" id="nama" name="nama"
                            value="{{ $mahasiswa->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control border border-success" id="nim" name="nim"
                            value="{{ $mahasiswa->nim }}">
                    </div>
                    <p class="mb-2">Semester</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="semester">
                        <option value="1" {{ $mahasiswa->semester == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $mahasiswa->semester == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $mahasiswa->semester == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $mahasiswa->semester == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $mahasiswa->semester == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $mahasiswa->semester == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $mahasiswa->semester == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $mahasiswa->semester == 8 ? 'selected' : '' }}>8</option>
                    </select>
                    <p class="mb-2">Jenis Kelamin</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="jenis_kelamin">
                        <option value="Laki-Laki" {{ $mahasiswa->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>
                        <option value="Perempuan" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control border border-success" id="email" name="email"
                            value="{{ $mahasiswa->email }}">
                    </div>
                    <button type="submit" class="btn btn-success mt-4" style="width: 100%">Edit Data Mahasiswa</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 text-end my-5 px-0">
                <a href="/kelola-data/mahasiswa" class="btn btn-success">Kembali ke Halaman Mahasiswa</a>
            </div>
        </div>

    </div>
@endsection
