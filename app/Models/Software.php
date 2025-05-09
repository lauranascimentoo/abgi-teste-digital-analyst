<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table = 'softwares';
    protected $fillable = [
        'nome',
        'versao',
        'status',
        'download_url',
    ];
}
