<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MedicamentoController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:manipular medicamentos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('medicamento.lista')
            ->with('records', Medicamento::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('medicamento.form');
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
            Medicamento::create([
                'cod_m' => $request['Cod_M'],
                'nombre' => $request['Nombre'],
            ]);
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicamentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('medicamento.show')
            ->with('record', Medicamento::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View::make('medicamento.form')
            ->with('record', Medicamento::find($id));
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
        $medicamento = Medicamento::find($id);

        $medicamento->cod_m = $request['Cod_M'];
        $medicamento->nombre = $request['Nombre'];

        try {
            $medicamento->save();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicamentos');
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
            Medicamento::find($id)->delete();
        } catch (Exception $e) {
            return View::make('error')->with('error', $e->getMessage());
        }

        return redirect('/medicamentos');
    }
}
