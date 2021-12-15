@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
    
    <div class="alert alert-success alert-dismissible" role="alert">

        {{ Session::get('mensaje') }}
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>
        </button>

    </div>
@endif

<a href="{{ url('servicios_tipos/create')}}" class="btn btn-success" >Crear nuevo servicio</a>
<br>
<br>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre Servicio</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $serviciostipos as $serviciotipo)
        <tr>
            <td>{{ $serviciotipo->id }}</td>
            <td>{{ $serviciotipo->Nombre }}</td>
            <td>
                
                <a href="{{ url('/servicios_tipos/'.$serviciotipo->id.'/edit' ) }}"  class="btn btn-warning"> 
                    Editar
                </a>
                
                | 

                <form action="{{ url('/servicios_tipos/'.$serviciotipo->id)}}" method="post" class="d-inline">
                   
                    @csrf
                    {{ method_field('DELETE') }}

                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere eliminar el registro {{$serviciotipo->id}} ?')"
                    value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $serviciostipos->links() !!}

</div>

@endsection
