<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadiran_magang';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function siswa() {
        return $this->belongsTo(siswa::class, 'nisSiswa');
    }
}
