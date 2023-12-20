<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'semester',
        'jenis_kelamin',
        'email',
        'jurusan_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);    
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nim', 'like', '%' . $search . '%')
                    ->orWhereHas('jurusan', fn($query) =>
                        $query->where('nama', 'like', '%' . $search . '%')
                    )
            )
        );

        $query->when($filters['fakultas'] ?? false, fn($query, $fakultas) =>
            $query->WhereHas('jurusan.fakultas', fn($query) =>
                $query->where('nama', $fakultas)
            )
        );

        $query->when($filters['jurusan'] ?? false, fn($query, $jurusan) =>
            $query->WhereHas('jurusan', fn($query) =>
                $query->where('nama', $jurusan)
            )
        );
    }    
}
