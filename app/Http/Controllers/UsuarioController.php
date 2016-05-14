<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;// es preciso invocar los request para que lo pueda llamar
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
        //$users=User::all();//muestra todos los elementos de la tabla
        $users=User::paginate(2);//muestra todos los elementos de la tabla paginado , 2 es el numero de elementos por pagina
      //$users=User::onlyTrashed()->paginate(2); //Mostrando los elemntos elimnados
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
    public function store(UserCreateRequest $request) //Ahora nuestro Request es cambiado por UsuarioCreateRequest para que agrege las validaciones definidas en ella (reglas de negocio)
    {
        //return("Aqui estoy");
        //\Cinema\User::create(
        User::create(   // esta funcion crea un nuevo objeto User y le pasa los valores iniciales
            [
             'name'=>$request['name'],
             'email'=>$request['email'],
             //'password'=>bcrypt( $request['password'])
                'password'=>$request['password']  // Ya no se llama a la funcion de encriptacion bcryt  porque en el modelo se ha definido el set con la encriptacion del password
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


    //public function update(Request $request, $id)
    public function update(UserUpdateRequest $request, $id) //Ahora nuestro Request es cambiado por UsuarioUpdateRequest para que agrege las validaciones definidas en ella (reglas de negocio)

    {
        //

        $user=User::find($id);  //obtiene el elemento con el codigo $id


        $user->fill($request->all()); //rellena todas las modificaciones hechas al registro, excepto el id
        $user->save(); //luego ejecuta la actualizacion en la base de datos

        //return redirect('/usuario')->width('message','Usuario Actualizado Exitosamente');

        Session::flash('message','Usuario editado correctamente'); //Guarda en la sesion la variable message con el valor 'usuario editado correcntamente'
            return Redirect::to('/usuario'); // luego redirecciona al usuario.index con el mensaje


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
        //User::destroy($id); destruir el recurso

        $user=User::find($id);
        $user->delete();
        Session::flash('message','Usuario eliminado correctamente');
        return Redirect::to('/usuario');


        //
    }

}
