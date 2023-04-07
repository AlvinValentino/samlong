<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginGuru extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['kode'];
    protected $fillable = ['kode', 'email', 'password'];
    protected $table = 'login_guru';
    protected $primaryKey = 'kode';
    public $timestamps = false;
    public $incrementing = false;

    public function guru() {
        return $this->hasOne(Guru::class, 'kode');
    }
}
