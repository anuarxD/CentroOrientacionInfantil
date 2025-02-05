<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Psychologist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PsychologistTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_a_user_has_one_psychologist()
    {
        $user = User::factory()->create();

        $psychologist = Psychologist::factory()->create(['usuario_id' => $user->id]);

        // Verificar que el usuario tiene un psicologo
        $this->assertInstanceOf(Psychologist::class, $user->psychologist);
        $this->assertEquals($psychologist->id, $user->psychologist->id);
    }

}
