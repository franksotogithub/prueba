<?php

namespace Cinema\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Cinema\Http\Requests\LoginRequest;
use Cinema\Http\Requests;

class LogController extends Controller
{
    //
    public function index()
    {

    }

    public function store(LoginRequest $request)
    {
    if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
    {return Redirect::to('admin');}

    Session::flash('message-errors','Datos incorrectos');
    return Redirect::to('/');


    }

    public function logout()
    {Auth::logout();
       return Redirect::to('/');

    }



}
