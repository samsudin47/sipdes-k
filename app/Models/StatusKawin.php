<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKawin extends Model
{
    protected $table = "status_kawin";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
