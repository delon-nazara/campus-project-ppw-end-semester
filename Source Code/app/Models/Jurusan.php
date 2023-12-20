<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'fakultas_id'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
    
    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }
    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('nama', 'like', '%' . $search . '%')
            )
        );
    }
}
