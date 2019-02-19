<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsuariosTest extends TestCase
{
    use RefreshDatabase;//para que refresque la base de datos de entorno de pruebas 
    
    /**
     * Prueba que funciona la ruta de listado de usuarios
     * @test
     */
    function listado_de_usuarios()
    {
        factory(Usuario::class)->create
        ([
            'login' => 'elsadlacra'
        ]);

        factory(Usuario::class)->create
        ([
            'login' => 'elyunta'
        ]);

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de Usuarios')
            ->assertSee('elsadlacra')
            ->assertSee('elyunta');
    }
    /**
    *Prueba que revisa la ruta cuando no hay usuarios
    *@test
    */
    function listado_vacio()
    {
        DB::table('usuarios')->truncate();
        //para que vacia la base de datos de prueba
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');
    }

    /**
    *@test
    */
    function campo_login_vacio()
    {
        $this->from('/usuarios/nuevo')
            ->post('/usuarios',
            [
                'login'=>'',
                'nombre'=>'Yeison',
                'clave'=>'12345678'

            ])
            ->assertRedirect('/usuarios/nuevo')//debe redireccionar a la url /usuarios/nuevo
            ->assertSessionHasErrors();//pero ahora con este mensaje de error
                
            $this->assertEquals(0,Usuario::count());
    }
}
