<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('consulta.lista')
            ->with('records', Consulta::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('consulta.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Consulta::create([
            'no_control' => $request['No_Control'],
            'cedula' => $request['Cedula'],
            'fecha_consulta' => $request['Fecha_consulta'],
            'descripcion' => $request['Descripcion'],
            'cod_m' => $request['Cod_M']
        ]);

        return redirect('/consultas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('consulta.show')
            ->with('record', Consulta::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View::make('consulta.form')
            ->with('record', Consulta::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consulta = Consulta::find($id);

        $consulta->no_control = $request['No_Control'];
        $consulta->cedula = $request['Cedula'];
        $consulta->fecha_consulta = $request['Fecha_consulta'];
        $consulta->descripcion = $request['Descripcion'];
        $consulta->cod_m = $request['Cod_M'];

        $consulta->save();

        return redirect('/consultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consulta::find($id)->delete();

        return redirect('/consultas');
    }
}
