<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ReporteController extends Controller
{
    /**
     * @param
     */
    public function __construct()
    {
        $this->middleware('can:ver reportes');
    }

    function index()
    {
        return View::make('reporte.filter');
    }

    function show(Request $request)
    {
        $result = Consulta::select('medicamentos.nombre', DB::raw('COUNT(*) AS cuenta'))
            ->join('medicamentos', 'consultas.cod_m', '=' , 'medicamentos.cod_m')
            /* ->whereBetween('fecha_consulta', [$request->fecha_inicio, $request->fecha_final]) */
            ->groupBy('medicamentos.nombre')->get();

        $data = [
            'labels' => [],
            'data' => []
        ];

        foreach ($result as $item) {
            array_push($data['labels'], $item['nombre']);
            array_push($data['data'], (int)$item['cuenta']);
        }

        return View::make('reporte.show')
            ->with('data', json_encode($data))
            ->with('request', $request);
    }
}
