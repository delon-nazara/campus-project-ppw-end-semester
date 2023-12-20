@extends('layout')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-8 card shadow-lg p-5">
                <h2 class="text-center mb-5">Tambah Data Mahasiswa Baru</h2>
                <form action="/kelola-data/mahasiswa/tambahPost" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label @error('nama') is-invalid @enderror">Nama</label>
                        <input type="text" class="form-control border border-success" id="nama" name="nama"
                            value="{{ old('nama') }}" placeholder="Input Nama disini">
                        @error('nama')
                            <div class="invalid-feedback ms-2 mb-1">
                                Input nama tidak boleh kosong dan maksimal 255 karakter!
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nim" class="form-label @error('nim') is-invalid @enderror">NIM</label>
                        <input type="text" class="form-control border border-success" id="nim" name="nim"
                            value="{{ old('nim') }}" placeholder="Input NIM disini">
                        @error('nim')
                            <div class="invalid-feedback ms-2 mb-1">
                                Input nim tidak boleh kosong, melebihi 9 angka, atau nim sudah tercatat di database!
                            </div>
                        @enderror
                    </div>

                    <p class="mb-2">Semester</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="semester">
                        <option value="1" {{ old('semester') == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('semester') == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('semester') == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('semester') == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('semester') == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ old('semester') == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ old('semester') == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ old('semester') == 8 ? 'selected' : '' }}>8</option>
                    </select>

                    <p class="mb-2">Jurusan</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="jurusan">
                        <option value="1" {{ old('jurusan') == 1 ? 'selected' : '' }}>Kedokteran</option>
                        <option value="2" {{ old('jurusan') == 2 ? 'selected' : '' }}>Ilmu Hukum</option>
                        <option value="3" {{ old('jurusan') == 3 ? 'selected' : '' }}>Agroteknologi</option>
                        <option value="4" {{ old('jurusan') == 4 ? 'selected' : '' }}>Agribisnis</option>
                        <option value="5" {{ old('jurusan') == 5 ? 'selected' : '' }}>Peternakan</option>
                        <option value="6" {{ old('jurusan') == 6 ? 'selected' : '' }}>Ilmu dan Teknologi Pangan
                        </option>
                        <option value="7" {{ old('jurusan') == 7 ? 'selected' : '' }}>Teknik Pertanian dan Biosistem
                        </option>
                        <option value="8" {{ old('jurusan') == 8 ? 'selected' : '' }}>Manajemen Sumber Daya Perairan
                        </option>
                        <option value="9" {{ old('jurusan') == 9 ? 'selected' : '' }}>Teknik Kimia</option>
                        <option value="10" {{ old('jurusan') == 10 ? 'selected' : '' }}>Teknik Sipil</option>
                        <option value="11" {{ old('jurusan') == 11 ? 'selected' : '' }}>Teknik Lingkungan</option>
                        <option value="12" {{ old('jurusan') == 12 ? 'selected' : '' }}>Teknik Mesin</option>
                        <option value="13" {{ old('jurusan') == 13 ? 'selected' : '' }}>Teknik Elektro</option>
                        <option value="14" {{ old('jurusan') == 14 ? 'selected' : '' }}>Teknik Industri</option>
                        <option value="15" {{ old('jurusan') == 15 ? 'selected' : '' }}>Arsitektur</option>
                        <option value="16" {{ old('jurusan') == 16 ? 'selected' : '' }}>Akuntasi</option>
                        <option value="17" {{ old('jurusan') == 17 ? 'selected' : '' }}>Manajemen</option>
                        <option value="18" {{ old('jurusan') == 18 ? 'selected' : '' }}>Ekonomi Pembangunan</option>
                        <option value="19" {{ old('jurusan') == 19 ? 'selected' : '' }}>Kewirausahaan</option>
                        <option value="20" {{ old('jurusan') == 20 ? 'selected' : '' }}>Kedokteran Gigi</option>
                        <option value="21" {{ old('jurusan') == 21 ? 'selected' : '' }}>Bahasa Mandarin</option>
                        <option value="22" {{ old('jurusan') == 22 ? 'selected' : '' }}>Etnomusikologi</option>
                        <option value="23" {{ old('jurusan') == 23 ? 'selected' : '' }}>Ilmu Sejarah</option>
                        <option value="24" {{ old('jurusan') == 24 ? 'selected' : '' }}>Perpustakaan dan Sains
                            Informasi</option>
                        <option value="25" {{ old('jurusan') == 25 ? 'selected' : '' }}>Sastra Arab</option>
                        <option value="26" {{ old('jurusan') == 26 ? 'selected' : '' }}>Sastra Batak</option>
                        <option value="27" {{ old('jurusan') == 27 ? 'selected' : '' }}>Sastra Indonesia</option>
                        <option value="28" {{ old('jurusan') == 28 ? 'selected' : '' }}>Sastra Inggris</option>
                        <option value="29" {{ old('jurusan') == 29 ? 'selected' : '' }}>Sastra Melayu</option>
                        <option value="30" {{ old('jurusan') == 30 ? 'selected' : '' }}>Matematika</option>
                        <option value="31" {{ old('jurusan') == 31 ? 'selected' : '' }}>Fisika</option>
                        <option value="32" {{ old('jurusan') == 32 ? 'selected' : '' }}>Kimia</option>
                        <option value="33" {{ old('jurusan') == 33 ? 'selected' : '' }}>Biologi</option>
                        <option value="34" {{ old('jurusan') == 34 ? 'selected' : '' }}>Sosiologi</option>
                        <option value="35" {{ old('jurusan') == 35 ? 'selected' : '' }}>Ilmu Politik</option>
                        <option value="36" {{ old('jurusan') == 36 ? 'selected' : '' }}>Ilmu Komunikasi</option>
                        <option value="37" {{ old('jurusan') == 37 ? 'selected' : '' }}>Ilmu Kesejahteraan Sosial
                        </option>
                        <option value="38" {{ old('jurusan') == 38 ? 'selected' : '' }}>Ilmu Administrasi Bisnis
                        </option>
                        <option value="39" {{ old('jurusan') == 39 ? 'selected' : '' }}>Ilmu Administrasi Publik
                        </option>
                        <option value="40" {{ old('jurusan') == 40 ? 'selected' : '' }}>Antropologi Sosial</option>
                        <option value="41" {{ old('jurusan') == 41 ? 'selected' : '' }}>Kesehatan Masyarakat</option>
                        <option value="42" {{ old('jurusan') == 42 ? 'selected' : '' }}>Gizi</option>
                        <option value="43" {{ old('jurusan') == 43 ? 'selected' : '' }}>Ilmu Keperawatan</option>
                        <option value="44" {{ old('jurusan') == 44 ? 'selected' : '' }}>Psikologi</option>
                        <option value="45" {{ old('jurusan') == 45 ? 'selected' : '' }}>Farmasi</option>
                        <option value="46" {{ old('jurusan') == 46 ? 'selected' : '' }}>Ilmu Komputer</option>
                        <option value="47" {{ old('jurusan') == 47 ? 'selected' : '' }}>Teknologi Informasi</option>
                        <option value="48" {{ old('jurusan') == 48 ? 'selected' : '' }}>Kehutanan</option>
                    </select>

                    <p class="mb-2">Jenis Kelamin</p>
                    <select class="form-select border border-success mb-3" aria-label="Default select example"
                        name="jenis_kelamin">
                        <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>

                    <div class="mb-3">
                        <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                        <input type="text" class="form-control border border-success" id="email" name="email"
                            value="{{ old('email') }}" placeholder="Input Email disini">
                        @error('email')
                            <div class="invalid-feedback ms-2 mb-1">
                                Input email tidak boleh kosong dan harus sesuai format!
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mt-4" style="width: 100%">Tambah Data
                        Mahasiswa</button>
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
