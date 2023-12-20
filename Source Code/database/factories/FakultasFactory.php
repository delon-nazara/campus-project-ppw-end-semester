<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class FakultasFactory extends Factory
{
    private $counter = 0;
    
    public function definition(): array
    {
        $array = [
            'Kedokteran', 
            'Hukum',
            'Pertanian',
            'Teknik',
            'Ekonomi dan Bisnis',
            'Kedokteran Gigi',
            'Ilmu Budaya',
            'Matematika dan Ilmu Pengetahuan Alam',
            'Ilmu Sosial dan Ilmu Politik',
            'Kesehatan Masyarakat',
            'Keperawatan',
            'Psikologi',
            'Farmasi',
            'Ilmu Komputer dan Teknologi Informasi',
            'Kehutanan',
        ];

        $nama = $array[$this->counter % count($array)];
        $this->counter++;
        
        return [
            'nama' => $nama
        ];
    }
}
