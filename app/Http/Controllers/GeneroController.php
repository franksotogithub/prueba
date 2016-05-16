<?php

namespace Cinema\Http\Controllers;
use Cinema\Genero;
use Illuminate\Http\Request;

use Cinema\Http\Requests;

class GeneroController extends Controller
{
    //

    public function index()
    {return view('genero.index');}

    public function create()
    {return view('genero.create');}

    public function show($id)
    {}


    
    public function listing(){
        $generos=Genero::all();
        return  response()->json($generos->toArray());
    }

    public function store(Request $request)
    {

        if($request->ajax()){

        Genero::create($request->all());
            //return response()->json(["mensaje"=>$request->all()]);
        return response()->json(["mensaje"=>'creado']);

    }

    }


    public function edit($id)
    {$genero=Genero::find($id);
        return response()->json($genero->toArray());

    }

    

    public function update(Request $request,$id)
    {$genre=Genero::find($id);
        $genre->fill($request->all());
    $genre->save();
        return response()->json(["mensaje"=>"listo"]);
    }
    
    
}
