@extends('layouts.app')

@section('content')
<div class="container">

<form action=" {{ url( '/servicios_tipos/'.$serviciostipos->id ) }} " method="post" enctype="multipart/form-data">
    
    @csrf

    {{ method_field('PATCH')}}

    @include('servicios_tipos.form',['modo'=>'Editar'])

</form>
</div>
@endsection