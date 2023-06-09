<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bos extends Authenticatable
{
    use HasFactory;

    protected $table = 'bos';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function siswa() {
        return $this->hasMany(Siswa::class);
    }
}
