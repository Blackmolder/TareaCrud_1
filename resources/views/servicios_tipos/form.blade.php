
<h1>{{$modo}} Servicio</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>

            @foreach( $errors->all() as $error)
               <li> {{ $error }} </li>
            @endforeach

        </ul>

    </div>

@endif

<div class="form-group">

<label for="Nombre">Nombre Servicio</label>
    <input type="text" class="form-control" name="Nombre" id="Nombre" 
    value="{{ isset($serviciostipos->Nombre)?$serviciostipos->Nombre:old('Nombre') }}">
    <br>
</div>
<input class="btn btn-success" type="submit" value="{{$modo}} Datos">

<a class="btn btn-primary" href="{{ url('servicios_tipos/')}}">Regresar</a>

<br>