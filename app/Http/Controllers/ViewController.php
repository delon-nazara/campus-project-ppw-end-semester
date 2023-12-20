<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use App\Models\User;
use App\Models\Nilai;

class ViewController extends Controller
{
    public function login()
    {
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function loginValidation(Request $request)
    {
        $validasi = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $request['username'])->first();
        if ($user && $user->password == $request['password']) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/beranda');
        }

        return back()->with('loginError', 'Login gagal. Silahkan coba kembali!');
    }

    public function beranda()
    {
        if(Auth::user()->username == 'admin') {

            return view('beranda', [
                "title" => "Beranda"
            ]);

        } else {

            $semester = 1;
            if (request('semester')) {
                $semester = request('semester');
            }

            $nilaiSemester = Nilai::whereHas('mahasiswa', fn($query) => $query->where('nim', Auth::user()->username))
            ->whereHas('mataKuliah', fn($query) => $query->where('semester', $semester))->get();

            $totalSKS = MataKuliah::whereHas('jurusan.mahasiswa', fn($query) => $query->where('nim', Auth::user()->username))
            ->where('semester', $semester)->sum('sks');
            
            $konversi = [
                'A' => 4,
                'B' => 3,
                'C' => 2,
                'D' => 1,
                'E' => 0,
            ];
            
            $totalBobot = 0;
            foreach ($nilaiSemester as $nilai) {
                $bobot = $konversi[$nilai->huruf];
                $totalBobot += $bobot * $nilai->mataKuliah->sks;
            }
        
            $totalIP = $totalBobot / $totalSKS;
            
            return view('beranda-mahasiswa', [
                "title" => "Beranda",
                "mahasiswa" => Mahasiswa::where('nim', Auth::user()->username)->first(),
                "semester" => $semester,
                "totalSKS" => $totalSKS,
                "totalIP" => $totalIP
            ]);

        };
    }

    public function mahasiswa()
    {
        $sort_by = 'nama';

        if (request('sort_by') == 'nama') {
            $sort_by = 'nama'; 
        } else if (request('sort_by') == 'nim') {
            $sort_by = 'nim'; 
        } else if (request('sort_by') == 'jurusan') {
            $sort_by = 'jurusan_id';  
        } 
        
        $mahasiswa = Mahasiswa::filter(request(['search', 'fakultas', 'jurusan']))
            ->orderBy($sort_by)
            ->paginate(20);   

        $heading = "";
        if (request('fakultas')) {
            $heading = " Fakultas " . request('fakultas');
        } else if (request('jurusan')) {
            $heading = " Jurusan " . request('jurusan');
        } 
        
        return view('mahasiswa', [
            "title" => "Mahasiswa",
            "heading" => $heading,
            "mahasiswa" => $mahasiswa,
            "sort_by" => request('sort_by'),
            "search" => request('search'),
            "fakultas" => request('fakultas'),
            "jurusan" => request('jurusan')
        ]);
    }
    
    public function profilMahasiswa(Mahasiswa $mahasiswa)
    {
        $semester = 1;
        if (request('semester')) {
            $semester = request('semester');
        }
        
        $nilaiSemester = Nilai::whereHas('mahasiswa', fn($query) => $query->where('nama', $mahasiswa->nama))
        ->whereHas('mataKuliah', fn($query) => $query->where('semester', $semester))->get();

        $totalSKS = MataKuliah::whereHas('jurusan.mahasiswa', fn($query) => $query->where('nama', $mahasiswa->nama))
        ->where('semester', $semester)->sum('sks');
        
        $konversi = [
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0,
        ];
        
        $totalBobot = 0;
        foreach ($nilaiSemester as $nilai) {
            $bobot = $konversi[$nilai->huruf];
            $totalBobot += $bobot * $nilai->mataKuliah->sks;
        }
    
        $totalIP = $totalBobot / $totalSKS;

        return view('profil-mahasiswa', [
            "title" => "Profil Mahasiswa",
            "mahasiswa" => $mahasiswa,
            "semester" => $semester,
            "totalSKS" => $totalSKS,
            "totalIP" => $totalIP
        ]);
    }

    public function fakultas()
    {
        return view('fakultas', [
            "title" => "Fakultas",
            "fakultas" => Fakultas::filter(request(['search']))->get()
        ]);
    }

    public function jurusan()
    {
        return view('jurusan', [
            "title" => "Jurusan",
            "jurusan" => Jurusan::filter(request(['search']))->get()
        ]);
    }

    public function mataKuliah()
    {
        $sort_by = 'nama';

        if (request('sort_by') == 'nama') {
            $sort_by = 'nama'; 
        } else if (request('sort_by') == 'sks') {
            $sort_by = 'sks'; 
        } else if (request('sort_by') == 'semester') {
            $sort_by = 'semester';  
        } else if (request('sort_by') == 'jurusan') {
            $sort_by = 'jurusan_id';  
        } 
        
        $mataKuliah = MataKuliah::with('jurusan')
            ->filter(request(['search']))
            ->orderBy($sort_by);   
        
        return view('mata-kuliah', [
            "title" => "Mata Kuliah",
            "mataKuliah" => $mataKuliah->paginate(20),
            "sort_by" => request('sort_by'),
            "search" => request('search'),
        ]);
    }

    public function kelolaData()
    {
        return view('kelola-data', [
            "title" => "Kelola Data",
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
