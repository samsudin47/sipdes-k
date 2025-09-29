<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusRekam extends Model
{
    protected $table = "status_rekam";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
