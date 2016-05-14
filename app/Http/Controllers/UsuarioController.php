<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
//use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Process\Pipes\AbstractPipes;
use Cinema\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$users=\Cinema\User::all();
        $users=User::all();
       return view('usuario.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('usuario.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return("Aqui estoy");
        //\Cinema\User::create(
        User::create(
            [
             'name'=>$request['name'],
             'email'=>$request['email'],
             //'password'=>bcrypt( $request['password'])
                'password'=>$request['password']  //poque en el modelo al setear el password ya se esta haciendo la conversion
            ]);

        //return 'Usuario Registrado';
//1ra forma
        return redirect('/usuario')->with('message','store');

 //2da forma
        //return Redirect::to('/usuario')->with('message','store');

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
    //te retorna a la vista para editar
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user=User::find($id);

        return view('usuario.edit',['user'=>$user]);
        //
    }

    //te realiza el proceso de actualizar el usuario
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

        $user=User::find($id);


        $user->fill($request->all());
        $user->save();

        //return redirect('/usuario')->width('message','Usuario Actualizado Exitosamente');

        Session::flash('message','Usuario editado correctamente');
            return Redirect::to('/usuario');


    }

    //te elimina el registro pedido
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        Session::flash('message','Usuario eliminado correctamente');
        return Redirect::to('/usuario');


        //
    }

}
