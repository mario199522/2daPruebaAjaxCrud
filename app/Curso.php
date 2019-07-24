<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    public $timestamps= false;
    protected $fillable = [
        'descripcion','materiaid',
    ];
}
