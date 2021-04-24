<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Consulta;
use App\Models\Medicamento;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consulta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $alumnos = Alumno::pluck('no_control')->toArray();
        $medicamentos = Medicamento::pluck('nombre')->toArray();
        $medicos = Medico::pluck('cedula')->toArray();

        return [
            'no_control' => $this->faker->randomElement($alumnos),
            'cedula' => $this->faker->randomElement($medicos),
            'fecha_consulta' => today()->toDateString(),
            'descripcion' => $this->faker->text(),
            'cod_m' => $this->faker->randomElement($medicamentos)
        ];
    }
}
