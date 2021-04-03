<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Consulta;
use App\Models\Medicamento;
use App\Models\Medico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ConsultaController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:manipular consultas');
    }

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
        return View::make('consulta.form')
            ->with('alumnos', Alumno::all('no_control'))
            ->with('medicos', Medico::all('cedula', 'nombre'))
            ->with('medicamentos', Medicamento::all('cod_m', 'nombre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Consulta::create([
                'no_control' => $request['No_Control'],
                'cedula' => $request['Cedula'],
                'fecha_consulta' => $request['Fecha_consulta'],
                'descripcion' => $request['Descripcion'],
                'cod_m' => $request['Cod_M']
            ]);
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

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
        $consulta = Consulta::findOrFail($id);

        return View::make('consulta.show')
            ->with('record', $consulta)
            ->with('medico', Medico::find($consulta->cedula))
            ->with('medicamento', Medicamento::find($consulta->cod_m));
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
            ->with('record', Consulta::findOrFail($id))
            ->with('alumnos', Alumno::all('no_control'))
            ->with('medicos', Medico::all('cedula', 'nombre'))
            ->with('medicamentos', Medicamento::all('cod_m', 'nombre'));
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

        try {
            $consulta->save();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

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
        try {
            Consulta::find($id)->delete();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/consultas');
    }
}
