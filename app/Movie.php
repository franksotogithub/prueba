<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; //libreria laravel para obtener datos de fecha y hora

class Movie extends Model
{
    //
    protected $table="movies";
    public $timestamps=false;

    protected $fillable=['name','path','cast','direction','duration','genero_id'];

    //mutador : sirve para modificar elemntos o archivos antes de ser guardados
public function setPathAttribute($path)
{
    $this->attributes['path']=Carbon::now()->second.$path->getClientOriginalName(); //obtenemos los segundos , lo concatenamos con el nombre original del archivo
    $name=Carbon::now()->second.$path->getClientOriginalName(); //obtenemos los segundos , lo concatenamos con el nombre original del archivo
    \Storage::disk('local')->put($name,\File::get($path));

}

    public static function Movies()
    {
        return DB::table('movies')        //usamos el querybuilder para construir nuestra consulta sql (usamos la tabla movies)
            ->join('generos','generos.id','=','movies.genero_id')      // hacemos join con la tabla generos con el id de genero y el genro_id de movies
            ->select('movies.*','generos.genero') //seleccionamos todos los campos de movies y seleccionamos el campo denero de la tabla generos
            ->get();  
    }


}
