<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class daftarmodel extends Model
{
    use HasFactory;
    protected $table = 'daftar';
    protected $primaryKey = 'id_daftar';
    protected $guarded = [];


    public function kelas () {
        return $this->belongsTo(kelasmodel::class,"id_kelas");
    }
}
