<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Propietario;

class PropietariosTest extends TestCase
{
    use RefreshDatabase;
    
    /**
    *@test
    */
    function mostrar_listado_propietarios()
    {
        factory(Propietario::class)->create( ['nombre' => 'Yeison'] );
        factory(Propietario::class)->create( ['nombre' => 'Rahisbel'] );

        $this->get('propietarios')
        ->assertStatus(200)
        ->assertSee('Listado de Propietarios')
        ->assertSee('Yeison')
        ->assertSee('Rahisbel');
    }

    /**
    *@test
    */
    function listado_propietarios_vacio()
    {
        //$this->withoutExceptionHandling();
        DB::table('propietarios')->truncate();

        $this->get('propietarios')
        ->assertStatus(200)
        ->assertSee('No hay Propietarios registrados');
    }

    /**
    *@test
    */
    function campo_cedula_requerido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('cedula');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_nombre_requerido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('nombre');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_direccion_requerido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('direccion');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_telefono_requerido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('telefono');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_email_requerido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>''

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('email');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_email_debe_ser_valido()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'un mal correo'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('email');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_email_debe_ser_unico()
    {   
        factory(Propietario::class)->create(['email' => 'correo@correo.com']);

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('email');

        $this->assertEquals(1,Propietario::count());
    }

    /**
    *@test
    */
    function campo_cedula_minimo_siete_caracteres()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'123456',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('cedula');

        $this->assertEquals(0,Propietario::count());
    }

    /**
    *@test
    */
    function campo_cedula_maximo_diez_caracteres()
    {

        $this->from('propietarios/nuevo')
            ->post('propietarios',
                [
                    'cedula'=>'12345678901',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'

                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('cedula');

        $this->assertEquals(0,Propietario::count());
    }
}
