<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tk_id',
        'tk_prshid',
        'tk_name',
        'tk_apkid',
        'tk_cp',
    ];
}
