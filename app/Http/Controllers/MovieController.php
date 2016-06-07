<?php

namespace Cinema\Http\Controllers;

use Cinema\Genero;
use Illuminate\Http\Request;
use Cinema\Movie;
use Cinema\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$movies =Movie::Movies();


        //return $movies;
        return view('pelicula.index',compact('movies'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //return "Esto seria el formulario para crear";

        $generos=Genero::lists('genero','id');
        return view('pelicula.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        Session::flash('message','Pelicula Creada Correctamente');
        return Redirect::to('/pelicula');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $movie=Movie::find($id);
        $generos=Genero::lists('genero','id'); // lista los generos en forma de diccionario el genero es el contenido
        return view('pelicula.edit',['movie'=>$movie,'generos'=>$generos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $movie=Movie::find($id);
        $movie->fill($request->all());
        $movie->save();
        Session::flash('message','Pelicula Editada Correctamente');
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $movie=Movie::find($id);
        Storage::delete($movie->path);
        $movie->delete();

        Session::flash('message','Pelicula Eliminada Correctamente');
        return Redirect::to('/pelicula');

    }
}
