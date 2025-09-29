<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $table = "sex";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
