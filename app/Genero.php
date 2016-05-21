<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
USE Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    //
    use SoftDeletes;// aplicamos el uso
    protected  $dates=['deleted_at']; //creamos la variable $dates que hace referencia al campo delete_at que es el flag para determinar si un elemento se oculta o no
    //tenemos que añadir luego la columna delete_at a la tabla ya creada de usuarios

    protected $table="generos";
    public $timestamps=false;

    public $fillable=['genero'];
}
