<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Fakultas & Jurusan Generator
        Fakultas::factory(15)->create();
        Jurusan::factory(48)->create();

        // Admin Generator
        User::factory()->create([
            'username' => 'admin',
            'password' => 'admin'
        ]);

        // Mahasiswa Generator
        $semuaFakultas = Fakultas::all();
        $jurusan_id = 1;
        foreach ($semuaFakultas as $fakultas) {
            for ($jurusan = 1; $jurusan <= $fakultas->jurusan->count(); $jurusan++) { // jurusan
                for ($semester = 1; $semester <= 8; $semester += 2) { // jumlah semester
                    
                    $digit_1_2 = 23.5 - ($semester / 2);
                    $digit_3_4 = str_pad(strval($fakultas->id), 2, '0', STR_PAD_LEFT);
                    $digit_5_6 = str_pad(strval($jurusan), 2, '0', STR_PAD_LEFT);
                    
                    for ($j = 1; $j <= fake()->numberBetween(100, 150); $j++) { // jumlah mahasiswa
                        
                        $digit_7_9 = str_pad(strval($j), 3, '0', STR_PAD_LEFT);
                        $nim = $digit_1_2 . $digit_3_4 . $digit_5_6 . $digit_7_9;
                        
                        Mahasiswa::factory()->create([
                            'nim' => $nim,
                            'semester' => $semester,
                            'jurusan_id' => $jurusan_id
                        ]);

                        // User Generator
                        User::factory()->create([
                            'username' => $nim,
                            'password' => $nim,
                        ]);
                    }
                }
                $jurusan_id++;
            }
        }  
        
        // Mata Kuliah Generator
        $semuaJurusan = Jurusan::all();
        $jurusan_id = 1;
        foreach ($semuaJurusan as $jurusan) { // jurusan
            for ($semester = 1; $semester <= 8; $semester++) {  // jumlah semester
                for ($i = 1; $i <= 8; $i++) { // jumlah mata kuliah/semester
                    MataKuliah::factory()->create([
                        "semester" => $semester,
                        "jurusan_id" => $jurusan_id
                    ]);
                }
            }
            $jurusan_id++;
        }

        // Nilai Generator
        $semuaMahasiswa = Mahasiswa::all();
        foreach ($semuaMahasiswa as $mahasiswa) {
            for ($semester = 1; $semester < $mahasiswa->semester; $semester++) {
                foreach ($mahasiswa->jurusan->mataKuliah as $matkul) {
                    if ($matkul->semester == $semester) {
                        Nilai::factory()->create([
                            "mahasiswa_id" => $mahasiswa->id,
                            "mata_kuliah_id" => $matkul->id
                        ]);
                    }
                }
            }
        }

    }
}
