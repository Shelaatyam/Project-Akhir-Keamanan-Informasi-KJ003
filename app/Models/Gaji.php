<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = ['karyawan_id', 'gaji_pokok', 'tunjangan', 'total_gaji'];

    // Relasi ke Karyawan (Many-to-One)
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    // Mutator untuk mengenkripsi gaji pokok
    public function setGajiPokokAttribute($value)
    {
        $this->attributes['gaji_pokok'] = \Illuminate\Support\Facades\Crypt::encryptString($value);
    }

    // Accessor untuk mendekripsi gaji pokok
    public function getGajiPokokAttribute($value)
    {
        return \Illuminate\Support\Facades\Crypt::decryptString($value);
    }
}
