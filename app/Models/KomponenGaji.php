<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomponenGaji extends Model
{
    protected $table = 'komponen_gaji';
    protected $primaryKey = 'id_komponen_gaji';
    public $timestamps = false;
    protected $fillable = ['nama_komponen', 'kategori', 'jabatan', 'nominal', 'satuan'];
}