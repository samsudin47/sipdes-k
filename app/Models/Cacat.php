<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cacat extends Model
{
    protected $table = "cacat";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
