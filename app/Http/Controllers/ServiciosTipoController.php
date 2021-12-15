<?php

namespace App\Http\Controllers;

use App\Models\Servicios_tipo;
use Illuminate\Http\Request;

class ServiciosTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['serviciostipos'] = Servicios_tipo::paginate(5);
        return view('servicios_tipos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicios_tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos=[

            'Nombre'=>'required|string|max:150'
        ];
        $mensaje=[

            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        //$datosServicios = request()->all();
        $datosServicios = request()->except('_token');

        Servicios_tipo::insert($datosServicios);        

        //return response()->json($datosServicios);

        return redirect('servicios_tipos')->with('mensaje','Tipo Servicio Ingresado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicios_tipo  $servicios_tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios_tipo $servicios_tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicios_tipo  $servicios_tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serviciostipos = Servicios_tipo::findOrFail($id);

        return view('servicios_tipos.edit', compact('serviciostipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicios_tipo  $servicios_tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[

            'Nombre'=>'required|string|max:150'
        ];
        $mensaje=[

            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request,$campos,$mensaje);

        $datosServicios = request()->except(['_token','_method']);
        Servicios_tipo::where('id','=',$id)->update($datosServicios);

        $serviciostipos = Servicios_tipo::findOrFail($id);
        //return view('servicios_tipos.edit', compact('serviciostipos'));

        return redirect('servicios_tipos')->with('mensaje','Tipo Servicio Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicios_tipo  $servicios_tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        Servicios_tipo::destroy($id);
        //return redirect('servicios_tipos');

        return redirect('servicios_tipos')->with('mensaje','Tipo Servicio Eliminado '.$id);
    }
}
