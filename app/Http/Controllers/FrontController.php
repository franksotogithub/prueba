<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Movie;


class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() /*generamos un contructor y definimos dentro el midlerare (un control de peticiones)*/
    {
        $this->middleware('auth',['only'=>'admin']);  //aplicas el middleware auth y solo a la ruta del /admin
    }

    public function index()
    {
        return view('index');

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function contact()
    {
        return view('contact');

    }


    public function reviews()
    {
        $movies=Movie::Movies();
        return view('reviews',compact('movies'));
    }


    public function admin()
    {

        return view('admin/index');
    }
}
