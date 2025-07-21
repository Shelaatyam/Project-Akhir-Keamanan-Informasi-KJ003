<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi secara massal (mass assignable)
    protected $fillable = ['nama', 'alamat', 'no_ktp'];

    // Jika Anda menggunakan enkripsi untuk nomor KTP
    public function setNoKtpAttribute($value)
    {
        $this->attributes['no_ktp'] = \Illuminate\Support\Facades\Crypt::encryptString($value);
    }

    public function getNoKtpAttribute($value)
    {
        return \Illuminate\Support\Facades\Crypt::decryptString($value);
    }

    // Relasi ke Gaji (One-to-Many)
    public function gajis()
    {
        return $this->hasMany(Gaji::class);
    }
}
