<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MedicoController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:manipular medicos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('medico.lista')
            ->with('records', Medico::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('medico.form');
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
            Medico::create([
                'cedula' => $request['Cedula'],
                'nombre' => $request['Nombre'],
                'campus' => $request['Campus']
            ]);
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('medico.show')
            ->with('record', Medico::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View::make('medico.form')
            ->with('record', Medico::find($id));
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
        $medico = Medico::find($id);

        $medico->cedula = $request['Cedula'];
        $medico->nombre = $request['Nombre'];
        $medico->campus = $request['Campus'];

        try {
            $medico->save();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicos');
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
            Medico::find($id)->delete();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicos');
    }
}
