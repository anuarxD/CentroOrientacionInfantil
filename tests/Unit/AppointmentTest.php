<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Psychologist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
{
        use RefreshDatabase;

        public function test_a_appointment_belongs_to_patient_and_psychologist()
        {
            $patient = Patient::factory()->create();
        
            $psychologist = Psychologist::factory()->create();
        
            // Asignar el psicólogo al paciente
            $patient->update(['psychologist_id' => $psychologist->id]);
        
            // Crear una cita asociada al psicólogo y al paciente
            $appointment = Appointment::factory()->create([
                'psychologist_id' => $psychologist->id,
                'patient_id' => $patient->id
            ]);
        
            // Verificar que la cita pertenece al paciente
            $this->assertEquals($appointment->patient->id, $patient->id);
        
            // Verificar que la cita pertenece al psicólogo
            $this->assertEquals($appointment->psychologist->id, $psychologist->id);
        }
        

}