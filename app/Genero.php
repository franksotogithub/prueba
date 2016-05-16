<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //

    protected $table="generos";
    public $timestamps=false;

    public $fillable=['genero'];
}
