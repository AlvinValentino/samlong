<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['nis'];
    protected $table = 'siswa';
    protected $primaryKey = 'nis';

    public function login_siswa() {
        return $this->hasOne(User::class, 'nis');
    }

    public function pengumpulan() {
        return $this->hasMany(PengumpulanTugas::class);
    }

    public function bos() {
        return $this->belongsTo(Bos::class, 'idBos');
    }
}
