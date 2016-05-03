<?php
namespace Cinema\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 29/04/2016
 * Time: 12:57 AM
 */

class PruebaController extends Controller
{

    public function index()
    {
        return "Hola desde controller";
    }


    public function nombre($nombre)
    {
        return "Hola mi nombre es:".$nombre;

    }
    
    


}