<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
        
    protected $fillable = [
        'nama'
    ];

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
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
