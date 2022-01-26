<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Perusahaan extends Model
{
    use HasFactory;
    

    
    protected $fillable = [
        
        'pr_id',
        'pr_name',
        'pr_url',
    ];
}
