<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Psychologist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MedicalRecordTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_patient_has_a_medical_record()
    {
        $patient = Patient::factory()->create();

        $psychologist = Psychologist::factory()->create();

        // Crear un registro médico asociado al paciente y al psicólogo
        $medicalRecord = MedicalRecord::factory()->create([
            'patient_id' => $patient->id,
            'psychologist_id' => $psychologist->id,
        ]);

        // Verificar que el registro médico pertenece al paciente
        $this->assertInstanceOf(MedicalRecord::class, $patient->medicalRecords->first());
        $this->assertEquals($medicalRecord->id, $patient->medicalRecords->first()->id);
    }
}
