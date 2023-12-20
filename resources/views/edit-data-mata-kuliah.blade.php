@extends('layout')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-8 card shadow-lg p-5">
                <h2 class="text-center mb-5">Edit Data Mata Kuliah</h2>
                <form action="/kelola-data/mata-kuliah/edit" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $mataKuliah->id }}" name="id">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control border border-success" id="nama" name="nama"
                            value="{{ $mataKuliah->nama }}">
                    </div>
                    <p class="mb-2">SKS</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="sks">
                        <option value="1" {{ $mataKuliah->sks == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $mataKuliah->sks == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $mataKuliah->sks == 3 ? 'selected' : '' }}>3</option>
                    </select>
                    <p class="mb-2">Semester</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="semester">
                        <option value="1" {{ $mataKuliah->semester == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $mataKuliah->semester == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $mataKuliah->semester == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $mataKuliah->semester == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $mataKuliah->semester == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $mataKuliah->semester == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $mataKuliah->semester == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $mataKuliah->semester == 8 ? 'selected' : '' }}>8</option>
                    </select>
                    <button type="submit" class="btn btn-success mt-4" style="width: 100%">Edit Data Mata Kuliah</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-8 text-end my-5 px-0">
                <a href="/kelola-data/mata-kuliah" class="btn btn-success">Kembali ke Halaman Mata Kuliah</a>
            </div>
        </div>

    </div>
@endsection
