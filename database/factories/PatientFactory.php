<?php
namespace Database\Factories;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition()
    {
        $generos = ['Masculino', 'Femenino', 'Otro'];
        $relaciones = ['padre', 'madre', 'otro'];
        
        return [

            'fecha_nacimiento' => now()->subYears(5)->format('Y-m-d'),
            'genero' => $generos[array_rand($generos)],
            'direccion' => fake()->address(), 
            'telefono' => fake()->phoneNumber(),
            'tutor_nombre' => fake()->name(),
            'tutor_relacion' => $relaciones[array_rand($relaciones)],
            'tutor_telefono' => fake()->phoneNumber(),
            'historial_medico' => json_encode(['ninguno']),
            'alergias' => json_encode(['ninguno']),
            'usuario_id' => User::factory(),
            'psychologist_id' => null,
        ];
    }
}