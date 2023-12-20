<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function kelolaDataMahasiswa()
    {
        $sort_by = 'nama';

        if (request('sort_by') == 'nama') {
            $sort_by = 'nama'; 
        } else if (request('sort_by') == 'nim') {
            $sort_by = 'nim'; 
        } else if (request('sort_by') == 'jurusan') {
            $sort_by = 'jurusan_id';  
        } 
        
        $mahasiswa = Mahasiswa::filter(request(['search']))
            ->orderBy($sort_by)
            ->paginate(20);   

        return view('kelola-data-mahasiswa', [
            "title" => "Kelola Data Mahasiswa",
            "mahasiswa" => $mahasiswa,
            "sort_by" => request('sort_by'),
            "search" => request('search'),
        ]);
    }

    public function tambahDataMahasiswa()
    {      
        return view('tambah-data-mahasiswa', [
            "title" => "Kelola Data Mahasiswa",
        ]);
    }   

    public function tambahDataMahasiswaPost(Request $request)
    {      
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:9|unique:mahasiswas,nim',
            'email' => 'required|email',
        ]);

        if ($validatedData) {
            $mahasiswa = new Mahasiswa();
            $mahasiswa->nama = $request->nama;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->semester = $request->semester;
            $mahasiswa->jurusan_id = $request->jurusan;
            $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
            $mahasiswa->email = $request->email;
            $mahasiswa->save();

            $user = new User();
            $user->username = $request->nim;
            $user->password = $request->nim;
            $user->save();
            
            return redirect('/kelola-data/mahasiswa')->with('tambah', 'Data mahasiswa telah berhasil ditambahkan!');
        }

    }   

    public function editDataMahasiswa(Mahasiswa $mahasiswa)
    {      
        return view('edit-data-mahasiswa', [
            "title" => "Kelola Data Mahasiswa",
            "mahasiswa" => $mahasiswa,
        ]);
    }

    public function editDataMahasiswaPost(Request $request)
    {      
        $mahasiswa = Mahasiswa::find($request->input('id'));

        if ($mahasiswa) {
            $mahasiswa->nama = $request->input('nama');
            $mahasiswa->nim = $request->input('nim');
            $mahasiswa->semester = $request->input('semester');
            $mahasiswa->jenis_kelamin = $request->input('jenis_kelamin');
            $mahasiswa->email = $request->input('email');
            $mahasiswa->save();
        }

        return redirect('/kelola-data/mahasiswa')->with('edit', 'Data mahasiswa telah berhasil diedit!');
    }

    public function hapusDataMahasiswa(Mahasiswa $mahasiswa)
    {      
        $mahasiswa = Mahasiswa::find($mahasiswa->id);
        
        if ($mahasiswa) {
            $mahasiswa->delete();
        }

        return redirect('/kelola-data/mahasiswa')->with('hapus', 'Data mahasiswa telah berhasil dihapus!');
    }
}
