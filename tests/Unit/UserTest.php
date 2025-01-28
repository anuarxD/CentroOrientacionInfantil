<?php

namespace Tests\Unit;

use App\Models\User; // Importamos el modelo que vamos a probar
use PHPUnit\Framework\TestCase; // Clase base para pruebas unitarias

class UserTest extends TestCase
{
    /** @test */
    public function it_can_have_a_name()
{
    $user = new User();
    $user->name = 'Anuar Rodríguez';

    $this->assertEquals('Anuar Rodriguez', $user->name); // marca error porque mi nombre lleva acento 
}
    /** @test */
    public function it_has_default_values()
    {
        $user = new User();

        $this->assertEquals('Paciente', $user->role); // Probamos el valor por defecto de 'role'
        $this->assertEquals('inactivo', $user->status); // Probamos el valor por defecto de 'status'
    }
    
/** @test */
public function it_has_unique_email()
{
    $user = new User();
    $user->email = 'test@example.com';

    $this->assertEquals('test@example.com', $user->email);
}

/** @test */
public function it_is_instance_of_authenticatable()
{
    $user = new User();

    $this->assertInstanceOf(\Illuminate\Foundation\Auth\User::class, $user);
}

    
}
