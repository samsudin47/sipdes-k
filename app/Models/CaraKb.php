<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaraKb extends Model
{
    protected $table = "cara_kb";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
