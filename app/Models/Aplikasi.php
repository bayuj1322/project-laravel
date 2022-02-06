<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'apk_id',
        'apkt_id',
        'apk_img',
        'apk_name',
        'apk_url',
        'apk_desc',
    ];
}
