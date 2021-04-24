<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'no_control' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->name($gender),
            'sexo' => ($gender == 'male') ? 'Hombre' : 'Mujer',
            'carrera' => $this->faker->randomElement([
                'Ingenieria en Sistemas Computacionales',
                'Ingenieria en Gestión Empresarial',
                'Ingenieria en Mecatronica',
                'TIC\'s',
                'Ingenieria en Eleectro-Mecánica'
            ])
        ];
    }
}
