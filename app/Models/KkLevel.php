<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KkLevel extends Model
{
    protected $table = "kk_level";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
