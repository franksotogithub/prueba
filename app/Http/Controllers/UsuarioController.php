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
use Illuminate\Routing\Route; //estas libreria nos sirve para facilitar obtener parametros que se encuentran dentro de nuestra ruta

class UsuarioController extends Controller
{

/*******Hay que notar que se repite mucho el uso del find($id) que sirve para ubicar el elemento por el id , si queremos reducir esto se puede hacer de la siguiente forma:**/


    /********Ya no existe******/
    /*
    public function  __construct()
    {
        $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);  //esto es un filtro que ejecuta un proceso antes de llamar a nuestro controlador
                                            //@find hace referencia al nombre del metodo que se ejecutara en el filtro , las opciones entre  [] defienen los metodos donde se ejecutara el metodo find
    }

*/



    public function  __construct()
    {

        $this->middleware('auth');  //protegemmos con el middleware auth al controlador de usuario en todo el controlador


        $this->middleware('admin',['only'=>['create','edit']]); //p`rotegemos con este middleware creado los accesos del usuario para crear o editar
        //@find hace referencia al nombre del metodo que se ejecutara en el filtro , las opciones entre  [] defienen los metodos donde se ejecutara el metodo find
    }
    public function find(Route $route)
    {
        $this->user=User::find($route->getParameter('usuario'));
    return $route->getParameter('usuario');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {
       //$users=\Cinema\User::all();
        //$users=User::all();//muestra todos los elementos de la tabla
        $users=User::paginate(2);//muestra todos los elementos de la tabla paginado , 2 es el numero de elementos por pagina
      //$users=User::onlyTrashed()->paginate(2); //Mostrando los elemntos elimnados

        if($request->ajax())
        {return response()->json(view('usuario.users',compact('users'))->render());
        }

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

      /******************Esta forma ya no esta en 5.2 funciona en 5.1,
        User::create(   // esta funcion crea un nuevo objeto User y le pasa los valores iniciales
            [
             'name'=>$request['name'],
             'email'=>$request['email'],
             //'password'=>bcrypt( $request['password'])
                'password'=>$request['password']  // Ya no se llama a la funcion de encriptacion bcryt  porque en el modelo se ha definido el set con la encriptacion del password
            ]);

***************************/
/*************Esta forma rduce el codigo**************/
        User::create($request->all()
            );










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
