<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    private $counter = 0;

    public function definition(): array
    {
        $array = [
            'Kedokteran' => 1,
            'Ilmu Hukum' => 2,
            'Agroteknologi' => 3,
            'Agribisnis' => 3,
            'Peternakan' => 3,
            'Ilmu dan Teknologi Pangan' => 3,
            'Teknik Pertanian dan Biosistem' => 3,
            'Manajemen Sumber Daya Perairan' => 3,
            'Teknik Kimia' => 4,
            'Teknik Sipil' => 4,
            'Teknik Lingkungan' => 4,
            'Teknik Mesin' => 4,
            'Teknik Elektro' => 4,
            'Teknik Industri' => 4,
            'Arsitektur' => 4,
            'Akuntansi' => 5,
            'Manajemen' => 5,
            'Ekonomi Pembangunan' => 5,
            'Kewirausahaan' => 5,
            'Kedokteran Gigi' => 6,
            'Bahasa Mandarin' => 7,
            'Etnomusikologi' => 7,
            'Ilmu Sejarah' => 7,
            'Perpustakaan dan Sains Informasi' => 7,
            'Sastra Arab' => 7,
            'Sastra Batak' => 7,
            'Sastra Indonesia' => 7,
            'Sastra Inggris' => 7,
            'Sastra Melayu' => 7,
            'Matematika' => 8,
            'Fisika' => 8,
            'Kimia' => 8,
            'Biologi' => 8,
            'Sosiologi' => 9,
            'Ilmu Politik' => 9,
            'Ilmu Komunikasi' => 9,
            'Ilmu Kesejahteraan Sosial' => 9,
            'Ilmu Administrasi Bisnis' => 9,
            'Ilmu Administrasi Publik' => 9,
            'Antropologi Sosial' => 9,
            'Kesehatan Masyarakat' => 10,
            'Gizi' => 10,
            'Ilmu Keperawatan' => 11,
            'Psikologi' => 12,
            'Farmasi' => 13,
            'Ilmu Komputer' => 14,
            'Teknologi Informasi' => 14,
            'Kehutanan' => 15,
        ];

        $nama = array_keys($array)[$this->counter % count($array)];
        $fakultas = $array[$nama];
        $this->counter++;

        return [
            'nama' => $nama,
            'fakultas_id' => $fakultas
        ];
    }
}
