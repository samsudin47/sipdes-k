<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    protected $table = "asuransi";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
