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
            ->assertSessionHasErrors(['login']);//pero ahora con este mensaje de error
                
            $this->assertEquals(0,Usuario::count());
    }

    /**
    *@test
    */
    function campo_nombre_vacio()
    {
        $this->from('/usuarios/nuevo')
            ->post('/usuarios',
            [
                'login'=>'holaaaaaaaaa',
                'nombre'=>'',
                'clave'=>'12345678'

            ])
            ->assertRedirect('/usuarios/nuevo')//debe redireccionar a la url /usuarios/nuevo
            ->assertSessionHasErrors(['nombre']);//pero ahora con este mensaje de error
                
            $this->assertEquals(0,Usuario::count());
    }

    /**
    *@test
    */
    function campo_clave_vacio()
    {
        $this->from('/usuarios/nuevo')
            ->post('/usuarios',
            [
                'login'=>'holaaaaaaaaa',
                'nombre'=>'Yeison',
                'clave'=>''

            ])
            ->assertRedirect('/usuarios/nuevo')//debe redireccionar a la url /usuarios/nuevo
            ->assertSessionHasErrors(['clave']);//pero ahora con este mensaje de error
                
            $this->assertEquals(0,Usuario::count());
    }

    /**
    *@test
    */
    function login_debe_ser_unico()
    {

        factory(Usuario::class)->create(['login'=>'Yeisonfuentes']);

        $this->from('usuarios/nuevo')
            ->post('usuarios', 
                [
                    'login' => 'Yeisonfuentes',
                    'nombre' => 'Yeison', 
                    'clave' => '123456'
                ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors('login');

        $this->assertEquals(1,Usuario::count());
    }

    /**
    *@test
    */
    function clave_minimo_6_caracteres()
    {
        $this->from('usuarios/nuevo')
            ->post('usuarios',
                [
                    'login' => 'Yison',
                    'nombre' => 'Yeison Fuentes',
                    'clave' => '123'
                ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors('clave');

        $this->assertEquals(0,Usuario::count());

    }

    /**
    *@test
    */
    function clave_maximo_40_caracteres()
    {
        $this->from('usuarios/nuevo')
            ->post('usuarios',
                [
                    'login' => 'Yison',
                    'nombre' => 'Yeison Fuentes',
                    'clave' => '123456789123456789001234567890123456789012'
                ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors('clave');

        $this->assertEquals(0,Usuario::count());

    }

    /**
    *@test
    */
    function usuario_registrado()
    {
        //$this->withoutExceptionHandling();
        //Envia peticion post a la ruta /usuarios, con los datos que se quieren registrar
        $this->post('/usuarios/',
            [
                'login'=>'asdfasdon',
                'nombre'=>'Yeison Fuentes',
                'clave'=>'123456'
            ])
            ->assertRedirect('usuarios');
        //Verifica si los datos enviados arriba están registrados en la db de pruebas, se usa assert credentials porque es un usuario con clave encriptada
        
        $this->assertDatabaseHas('usuarios',
            [
                'login'=>'asdfasdon',
                'nombre'=>'Yeison Fuentes',
            ]
        );
    }


}
