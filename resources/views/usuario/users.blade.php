<table class="table">
    <thead>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Operacion</th>

    </thead>

    @foreach($users as $user)
        <tbody>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <!--Te direcciona a la vista de edicion de usuario-->
        <td>
            {!! link_to_route('usuario.edit','Editar',$user->id,['class'=>'btn btn-primary']) !!}

        </td>

        <!--Introduce un formulario que redireccina al metodo destroy del controlador usuario el cual se encarga de eliminar el elemento-->
        <td>
            {!! Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE']) !!}
            {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}

        </td>

        </tbody>
    @endforeach
</table>
{!! $users->render() !!}