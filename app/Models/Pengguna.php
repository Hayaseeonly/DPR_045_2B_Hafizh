<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;
    protected $fillable = ['username', 'password', 'email', 'nama_depan', 'nama_belakang', 'role'];
    protected $hidden = ['password'];
}