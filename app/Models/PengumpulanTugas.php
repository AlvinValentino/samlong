<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan_tugas';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'nisSiswa');
    }

    public function tugas() {
        return $this->belongsTo(Tugas::class, 'idTugas');
    }
}
