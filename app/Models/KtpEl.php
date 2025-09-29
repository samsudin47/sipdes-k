<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KtpEl extends Model
{
    protected $table = "ktp_el";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
