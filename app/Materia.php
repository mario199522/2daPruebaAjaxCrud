<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    public $timestamps= false;
    protected $fillable = [
        'descripcion',
    ];
}
