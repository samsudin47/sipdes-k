<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanKK extends Model
{
    protected $table = "pendidikan_kk";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
