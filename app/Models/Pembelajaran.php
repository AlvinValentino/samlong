<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pembelajaran';
    public $timestamps = false;

    public function guru() {
        return $this->belongsTo(Guru::class, 'kodeguru');
    }

    public function pelajaran() {
        return $this->belongsTo(Pelajaran::class, 'idPelajaran');
    }
}
