<?php

namespace Cinema\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Session;
use Redirect;
use Illuminate\Http\Request;

use Cinema\Http\Requests;

class MailController extends Controller
{
    //

    public function store(Request $request)
    {
       Mail::send('emails.contact',$request->all(),
           function($msj){
               $msj->subject('Correo de Contacto');
               $msj->to('franksoto2012@gmail.com');

           }
           );

        Session::flash('message','Mensaje Enviado Correctamente');
        return Redirect::to('/contact');


    }

}
