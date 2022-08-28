<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konfirmasimodel extends Model
{
    protected $table = 'konfirmasi';
    protected $primaryKey = 'id_konfirmasi';
    protected $guarded = [];

    public function daftar () {
        return $this->belongsTo(daftarmodel::class,"id_daftar");
    }
    public function kelas () {
        return $this->belongsTo(kelasmodel::class,"id_kelas");
    }
    public function user () {
        return $this->belongsTo(user::class,"id");
    }
    public function member () {
        return $this->belongsTo(user::class,"id");
    }
}
