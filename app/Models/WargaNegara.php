<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WargaNegara extends Model
{
    protected $table = "warga_negara";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
