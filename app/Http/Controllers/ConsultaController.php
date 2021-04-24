<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Consulta;
use App\Models\Medicamento;
use App\Models\Medico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->with('medicos', Medico::where('nombre', Auth::user()->name)->get())
            ->with('medicamentos', Medicamento::where('cantidad', '>', '0')->select('nombre')->get());
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

        $this->consumeMedicamento($request['Cod_M']);
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
            ->with('medicamentos', Medicamento::where('cantidad', '>', '0')
                ->orWhere('nombre', Consulta::find($id)->cod_m)
                ->select('nombre')->get());
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
        $this->validateForm($request);

        $consulta = Consulta::find($id);
        $this->consumeMedicamento($request['Cod_M']);
        $this->addMedicamento($consulta->cod_m);

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

    public function search() {
        return View::make('consulta.search');
    }

    public function filter(Request $request)
    {
        $model = new Consulta();

        $query = Consulta::select($model->getFillable());
        foreach ($model->getFillable() as $field) {
            if (isset($request[$field]) && $request[$field]) {
                $query->where($field, $request[$field]);
            }
        }

        return View::make('consulta.lista')
            ->with('records', $query->get());
    }

    private function consumeMedicamento($id) {
        $medicamento = Medicamento::find($id);

        $medicamento->cantidad -= 1;

        $medicamento->save();
    }

    private function addMedicamento($id) {
        $medicamento = Medicamento::find($id);

        $medicamento->cantidad += 1;

        $medicamento->save();
    }

    private function validateForm($request) {
        $request->validate([
            'No_Control' => 'string|required',
            'Cedula' => 'numeric|required',
            'Fecha_consulta' => 'date|required',
            'Descripcion' => 'string',
            'Cod_M' => 'string'
        ]);
    }
}
