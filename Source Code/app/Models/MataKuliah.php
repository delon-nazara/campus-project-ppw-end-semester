<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama',
        'sks',
        'semester',
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
                    ->orWhere('sks', 'like', '%' . $search . '%')
                    ->orWhere('semester', 'like', '%' . $search . '%')
                    ->orWhereHas('jurusan', fn($query) =>
                        $query->where('nama', 'like', '%' . $search . '%')
                    )
            )
        );
    }   
}
