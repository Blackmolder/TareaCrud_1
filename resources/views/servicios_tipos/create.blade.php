@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/servicios_tipos')}}" method="post" enctype="multipart/form-data">
    
    @csrf 
    @include('servicios_tipos.form',['modo'=>'Crear'])

</form>
</div>
@endsection