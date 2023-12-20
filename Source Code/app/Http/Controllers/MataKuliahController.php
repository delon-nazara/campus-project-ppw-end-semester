<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function kelolaDataMataKuliah()
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
        
        return view('kelola-data-mata-kuliah', [
            "title" => "Kelola Data Mata Kuliah",
            "mataKuliah" => $mataKuliah->paginate(20),
            "sort_by" => request('sort_by'),
            "search" => request('search'),
        ]);
    }
    
    public function editDataMataKuliah(MataKuliah $mataKuliah)
    {      
        return view('edit-data-mata-kuliah', [
            "title" => "Kelola Data Mata Kuliah",
            "mataKuliah" => $mataKuliah,
        ]);
    }

    public function editDataMataKuliahPost(Request $request)
    {      
        $mataKuliah = MataKuliah::find($request->input('id'));

        if ($mataKuliah) {
            $mataKuliah->nama = $request->input('nama');
            $mataKuliah->sks = $request->input('sks');
            $mataKuliah->semester = $request->input('semester');
            $mataKuliah->save();
        }

        return redirect('/kelola-data/mata-kuliah')->with('edit', 'Data mata kuliah telah berhasil diedit!');
    }

    public function hapusDataMataKuliah(MataKuliah $mataKuliah)
    {      
        $mataKuliah = MataKuliah::find($mataKuliah->id);
        
        if ($mataKuliah) {
            $mataKuliah->delete();
        }

        return redirect('/kelola-data/mata-kuliah')->with('hapus', 'Data mata kuliah telah berhasil dihapus!');
    }
}
