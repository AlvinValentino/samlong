<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function guru() {
        return $this->belongsTo(Guru::class, 'kodeguru');
    }

    public function pengumpulan() {
        return $this->hasMany(Tugas::class);
    }
}
