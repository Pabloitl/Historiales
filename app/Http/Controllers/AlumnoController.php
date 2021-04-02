<?php

namespace App\Http\Controllers;

use App\Models\Alumno as ModelsAlumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('alumno.lista')
            ->with('alumnos', ModelsAlumno::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('alumno.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ModelsAlumno::create([
            'no_control' => $request['No_Control'],
            'nombre' => $request['Nombre'],
            'sexo' => $request['Sexo'],
            'carrera' => $request['Carrera']
        ]);

        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('alumno.show')
            ->with('record', ModelsAlumno::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View::make('alumno.form')
            ->with('record', ModelsAlumno::find($id));
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
        $alumno = ModelsAlumno::find($id);

        $alumno->no_control = $request['No_Control'];
        $alumno->nombre = $request['Nombre'];
        $alumno->sexo = $request['Sexo'];
        $alumno->carrera = $request['Carrera'];

        $alumno->save();

        return redirect('/alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsAlumno::find($id)->delete();

        return redirect('/alumnos');
    }
}
