<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolemodel extends Model
{
    use HasFactory;
    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $guarded = [];
}
