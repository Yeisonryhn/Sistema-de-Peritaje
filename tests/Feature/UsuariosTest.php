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
    
    /** @test*/
    function listado_de_usuarios(){
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
    /** @test*/
    function listado_vacio(){
        DB::table('usuarios')->truncate();
        //para que vacia la base de datos de prueba
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados');
    }
    /** @test*/
    function campo_login_vacio(){
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
    /** @test*/
    function campo_nombre_vacio(){
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
    /** @test*/
    function campo_clave_vacio(){
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
    /** @test*/
    function login_debe_ser_unico(){
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
    /** @test*/
    function clave_minimo_6_caracteres(){
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
    /** @test*/
    function clave_maximo_40_caracteres(){
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
    /** @test*/
    function usuario_registrado(){
        //$this->withoutExceptionHandling();
        //Envia peticion post a la ruta /usuarios, con los datos que se quieren registrar
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',
            [
                'login'=>'asdfasdon',
                'nombre'=>'Yeison Fuentes',
                'clave'=>'123456'
            ])->assertRedirect('usuarios');
        //Verifica si los datos enviados arriba están registrados en la db de pruebas, se usa assert credentials porque es un usuario con clave encriptada        
        $this->assertDatabaseHas('usuarios',
            [
                'login'=>'asdfasdon',
                'nombre'=>'Yeison Fuentes',
            ]
        );
    }
    /** @test*/
    function it_loads_the_users_edit_page(){
        //$this->withoutExceptionHandling();
        $usuario = factory(Usuario::class)->create();
        ///dd($usuario);
        $this->get("usuarios/{$usuario->id}/editar")
            ->assertStatus(200)
            ->assertViewIs('users.edicion')
            ->assertSee('Editar Usuario')
            ->assertViewHas('usuario', function ($viewUser) use ($usuario){
                return $viewUser->id === $usuario->id;//para que no salga el error wasRecentlyCreated, se compara el id de la vista con el usuario que tiene en la prueba
            });//Revisa que la vista tenga una variable llamada usuario y que sea el objeto $usuario;
    }
    /** @test*/
    function it_loads_the_users_show_page (){
        //$this->withoutExceptionHandling();
        $usuario = factory(Usuario::class)->create([
            'login' => 'Yeisonryhn',
            'nombre' => 'Yeison Fuentes'
        ]);
        //dd($usuario);
        $this->get("/usuarios/".$usuario->id)
            ->assertStatus(200)
            ->assertSee("Detalle del usuario $usuario->nombre");
    }
    /** @test*/
    function it_update_a_user (){
        $usuario = factory(Usuario::class)->create();
        //$this->withoutExceptionHandling();        
        $this->from("/usuarios/{$usuario->id}/editar")->
        put("/usuarios/{$usuario->id}",[
            'login' => 'Yeison Fuentes',
            'nombre' => 'Yeisonfuentes@correo.net',
            'clave' => '123456'
        ])->assertRedirect("/usuarios/{$usuario->id}");
        
        $this->assertDatabaseHas('usuarios',[
            'login' => 'Yeison Fuentes',
            'nombre' => 'Yeisonfuentes@correo.net',
        ]);        
    }
    /** @test*/
    function the_login_can_be_the_same_when_updating_a_user(){
        $this->withoutExceptionHandling();
        $usuario = factory(Usuario::class)->create([
            'login' => 'mismo_login'
        ]);

        $this->from("usuarios/{$usuario->id}/editar")
        ->put("/usuarios/{$usuario->id}", [
            'login' => 'mismo_login',
            'nombre' => 'Nombre distinto',
            'clave' => ''
            
        ])->assertRedirect("/usuarios/{$usuario->id}");

        $this->assertDatabaseHas('usuarios', [
            'login' => 'mismo_login',
            'nombre' => 'Nombre distinto'
        ]);
        //dd($usuario);
    }
    /** @test*/
    function the_login_must_be_unique_when_updating_a_user(){
        //$this->withoutExceptionHandling();
        factory(Usuario::class)->create([
            'login' => 'mismo_login',
            'nombre' => 'Yeisonnnn',
            'clave' => ''
        ]);
        $usuario = factory(Usuario::class)->create();

        $this->from("/usuarios/{$usuario->id}/editar")->
        put("/usuarios/{$usuario->id}", [
            'login' => 'mismo_login',
            'nombre' => 'Nombrennnn'
        ])->assertRedirect("/usuarios/{$usuario->id}/editar")
          ->assertSessionHasErrors('login');       
    }
    /** @test*/
    function the_login_is_required_when_update_a_user(){
        $usuario = factory(Usuario::class)->create([]);

        $this->from("usuarios/{$usuario->id}/editar")
            ->put("usuarios/{$usuario->id}",[
                'login' => '',
                'nombre' => 'Yeison',
                'clave' => '123456'
            ])->assertRedirect("usuarios/{$usuario->id}/editar")
            ->assertSessionHasErrors('login');
    }
    /** @test*/
    function the_nombre_is_required_when_update_a_user(){
        $usuario = factory(Usuario::class)->create([]);

        $this->from("usuarios/{$usuario->id}/editar")
            ->put("usuarios/{$usuario->id}",[
                'login' => 'LoginNuevo',
                'nombre' => '',
                'clave' => '123456'
            ])->assertRedirect("usuarios/{$usuario->id}/editar")
            ->assertSessionHasErrors('nombre');
    }

    /** @test */
    function show_404_error_when_the_user_does_not_exist(){
        $this->get('usuarios/999')
            ->assertStatus(404)
            ->assertSee('Pagina no encontrada');
    }
}
