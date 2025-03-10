<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    use HasFactory;

    protected $table = 'habilidades';
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'tipo'
    ];
}
