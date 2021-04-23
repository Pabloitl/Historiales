<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AlumnoController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:manipular alumnos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('alumno.lista')
            ->with('records', Alumno::all());
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
        $this->validateForm($request);
        try {
            Alumno::create([
                'no_control' => $request['No_Control'],
                'nombre' => $request['Nombre'],
                'sexo' => $request['Sexo'],
                'carrera' => $request['Carrera']
            ]);

        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

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
            ->with('record', Alumno::findOrFail($id));
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
            ->with('record', Alumno::findOrFail($id));
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
        $this->validateFormUpdate($request);
        $alumno = Alumno::find($id);

        $alumno->no_control = $request['No_Control'];
        $alumno->nombre = $request['Nombre'];
        $alumno->sexo = $request['Sexo'];
        $alumno->carrera = $request['Carrera'];

        try {
            $alumno->save();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

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
        try {
            Alumno::find($id)->delete();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/alumnos');
    }

    private function validateForm($request) {
        $request->validate([
            'No_Control' => 'string|required|unique:alumnos',
            'Nombre' => 'string|required',
            'Carrera' => 'string|required'
        ]);
    }

    private function validateFormUpdate($request) {
        $request->validate([
            'No_Control' => 'string|required',
            'Nombre' => 'string|required',
            'Carrera' => 'string|required'
        ]);
    }
}
