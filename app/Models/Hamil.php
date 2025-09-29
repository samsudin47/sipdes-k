<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hamil extends Model
{
    protected $table = "hamil";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
