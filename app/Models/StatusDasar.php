<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusDasar extends Model
{
    protected $table = "status_dasar";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
