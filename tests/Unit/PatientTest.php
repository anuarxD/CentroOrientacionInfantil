<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientTest extends TestCase
{   
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
    }
   
    /** @test */

    public function test_a_patient_belongs_to_a_user()
    {
        // Crear un usuario
        $user = User::factory()->create();

        // Crear un paciente asociado al usuario
        $patient = Patient::factory()->create(['usuario_id' => $user->id]);

        // Verificar que el paciente pertenece al usuario
        $this->assertInstanceOf(User::class, $patient->user);
        $this->assertEquals($user->id, $patient->user->id);
    }

    /** @test */
    public function it_has_expected_values_for_sexo_and_tutor_relacion()
    {
        $sexos = ['Masculino', 'Femenino', 'Otro'];
        $tutorRelaciones = ['Padre', 'Madre', 'Otro'];

        $this->assertContains('Masculino', $sexos);
        $this->assertContains('Padre', $tutorRelaciones);
    }

    /** @test */
    public function test_a_user_has_one_patient()
    {
        // Crear un usuario
        $user = User::factory()->create();

        // Crear un paciente asociado al usuario
        $patient = Patient::factory()->create(['usuario_id' => $user->id]);

        // Verificar que el usuario tiene un paciente
        $this->assertInstanceOf(Patient::class, $user->patient);
        $this->assertEquals($patient->id, $user->patient->id);
    }
}
