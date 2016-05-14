<?php

namespace Cinema;

use Illuminate\Foundation\Auth\User as Authenticatable;

USE Illuminate\Database\Eloquent\SoftDeletes; //importar la libreria softdelete que se encarga de ocultar los elementos elimnados de una tabla pero no los eleimna realmente solo lo oculata

class User extends Authenticatable
{   use SoftDeletes;// aplicamos el uso
    protected  $dates=['deleted_at']; //creamos la variable $dates que hace referencia al campo delete_at que es el flag para determinar si un elemento se oculta o no
                                      //tenemos que añadir luego la columna delete_at a la tabla ya creada de usuarios

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password']=\Hash::make($valor);

        }

    }


    
}
