<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    public function definition(): array
    {
        // Nama Generator
        $nama = '';
        $jumlahKataNama = fake()->numberBetween(2, 5);
        for ($i = 0; $i < $jumlahKataNama; $i++) {
            $nama .= fake()->firstName . ' ';
        }
        $nama = rtrim($nama);

        // Jenis Kelamin Generator
        $jenis_kelamin = fake()->randomElement(['Laki-Laki', 'Perempuan']);

        // Email Generator
        $namaLengkap = explode(' ', $nama);
        $email = fake()->randomElement($namaLengkap) . 
                 fake()->randomNumber(2) . 
                 '@gmail.com';

        return [
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
        ];
    }
}

