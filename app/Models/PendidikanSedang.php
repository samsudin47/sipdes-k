<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanSedang extends Model
{
    protected $table = "pendidikan_sedang";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
