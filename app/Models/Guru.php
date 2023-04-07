<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $guarded = ['kode'];
    protected $primaryKey = 'kode';
    public $incrementing = false;

    public function pembelajaran() {
        return $this->hasMany(Pembelajaran::class);
    }

    public function loginguru() {
        return $this->hasOne(LoginGuru::class, 'kode');
    }
}
