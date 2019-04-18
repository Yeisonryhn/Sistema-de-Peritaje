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
    
    /** @test */
    function mostrar_listado_propietarios(){
        factory(Propietario::class)->create( ['nombre' => 'Yeison'] );
        factory(Propietario::class)->create( ['nombre' => 'Rahisbel'] );
        $this->get('propietarios')
        ->assertStatus(200)
        ->assertSee('Listado de Propietarios')
        ->assertSee('Yeison')
        ->assertSee('Rahisbel');
    }
    /** @test */
    function listado_propietarios_vacio(){
        //$this->withoutExceptionHandling();
        DB::table('propietarios')->truncate();
        $this->get('propietarios')
        ->assertStatus(200)
        ->assertSee('No hay Propietarios registrados');
    }
    /** @test */
    function detalle_de_propietario(){
        $propietario = factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes'
        ]);
        $this->get("propietarios/{$propietario->id}")
            ->assertStatus(200)
            ->assertSee("Detalle del propietario {$propietario->id}");
    }
    /** @test */
    function editar_de_propietario(){
        $propietario = factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes'
        ]);
        $this->get("propietarios/{$propietario->id}/editar")
            ->assertStatus(200)
            ->assertSee("Editar el Propietario {$propietario->id}");
    }
    /** @test */
    function campo_cedula_requerido(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_nombre_requerido(){
       $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_nombre_maximo_40_caracteres(){
        $this->from('propietarios/nuevo')
            ->post("propietarios",[
                'cedula'=>'12345678',
                'nombre'=>'Hola mi nombre es Yeison bladimir fuentes chacon',
                'direccion'=>'Una direccion valida por allá',
                'telefono'=>'04145698712',
                'email'=>'correo@correo.com'
            ])->assertRedirect("propietarios/nuevo")
            ->assertSessionHasErrors('nombre');
        $this->assertEquals(0,Propietario::count());
    }
    /** @test */
    function campo_nombre_minimo_2_caracteres(){
        $this->from('propietarios/nuevo')
            ->post("propietarios",[
                'cedula'=>'12345678',
                'nombre'=>'H',
                'direccion'=>'Una direccion valida por allá',
                'telefono'=>'04145698712',
                'email'=>'correo@correo.com'
            ])->assertRedirect("propietarios/nuevo")
            ->assertSessionHasErrors('nombre');
        $this->assertEquals(0,Propietario::count());
    }
    /** @test */
    function campo_direccion_requerido(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_direccion_maximo_200_caracteres(){
        $this->from("propietarios/nuevo")
            ->post("propietarios", [
                'cedula'=>'12345678',
                'nombre'=>'un nombre',
                'direccion'=>'Direccion muy largaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                'telefono'=>'04145698712',
                'email'=>'correo@correo.com'
            ])->assertRedirect("propietarios/nuevo")
            ->assertSessionHasErrors('direccion');
            $this->assertEquals(0,Propietario::count());
    }
    /** @test */
    function campo_telefono_requerido(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_telefono_maximo_11_caracteres(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
                    'cedula'=>'12345678',
                    'nombre'=>'un nombre',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'+584149999999',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect('propietarios/nuevo')
            ->assertSessionHasErrors('telefono');
        $this->assertEquals(0,Propietario::count());
    }
    /** @test */
    function campo_email_requerido(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_email_debe_ser_valido(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_email_debe_ser_unico(){   
        factory(Propietario::class)->create(['email' => 'correo@correo.com']);
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_cedula_minimo_siete_caracteres(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function campo_cedula_maximo_diez_caracteres(){
        $this->from('propietarios/nuevo')
            ->post('propietarios',[
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
    /** @test */
    function actualizar_propietario(){
        $propietario = factory(Propietario::class)->create();
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Fuentes',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}"); 

        $this->assertDatabaseHas('propietarios',[
            'cedula'=>'23498218',
            'nombre'=>'Yeison Fuentes',
            'direccion'=>'Una direccion valida por allá',
            'telefono'=>'04145698712',
            'email'=>'correo@correo.com'
        ]);
    }
    /** @test */
    function campo_nombre_requerido_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('nombre'); 
    }

    /** @test */
    function campo_nombre_maximo_40_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();

        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Hola mi nombre es Yeison bladimir fuentes chacon',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('nombre'); 
    }
    /** @test */
    function campo_nombre_minimo_2_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'H',
                    'direccion'=>'Una direccion valida por allá',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('nombre'); 
    }

    /** @test */
    function campo_direccion_requerida_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('direccion'); 
    }
    /** @test */
    function campo_direccion_maximo_200_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Direccion muy largaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
                    'telefono'=>'04145698712',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('direccion'); 
    }
    /** @test */
    function campo_telefono_requerido_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('telefono'); 
    }
    /** @test */
    function campo_telefono_maximo_11_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'1234567891234',
                    'email'=>'correo@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('telefono'); 
    }
    /** @test */
    function campo_email_requerido_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>''
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('email'); 
    }
    /** @test */
    function campo_email_debe_ser_valido_al_actualizar(){
        //$this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'correo no valido'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('email'); 
    }
    /** @test */
    function campo_email_unico_al_actualizar(){
        //$this->withoutExceptionHandling();
        factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);

        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('email'); 
    }
    /** @test */
    function campo_email_puede_ser_el_mismo_al_actualizar(){
        //$this->withoutExceptionHandling();
         $propietario = factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);       
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498218',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}");
        $this->assertDatabaseHas('propietarios', [
            'cedula'=>'23498218',
            'nombre'=>'Yeison Bladimir',
            'direccion'=>'Una direccion normal',
            'telefono'=>'12345678',
            'email'=>'Yeison@correo.com'
        ]);
    }
    /** @test */
    function campo_cedula_unica_al_actualizar(){
        //$this->withoutExceptionHandling();
        factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'cedula' => '23498281'
        ]);

        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498281',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('cedula'); 
    }
    /** @test */
    function campo_cedula_puede_ser_la_misma_al_actualizar(){
        //$this->withoutExceptionHandling();
         $propietario = factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'cedula' => '23498281'
        ]);       
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'23498281',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}");

        $this->assertDatabaseHas('propietarios', [
            'cedula'=>'23498281',
            'nombre'=>'Yeison Bladimir',
            'direccion'=>'Una direccion normal',
            'telefono'=>'12345678',
            'email'=>'Yeison@correo.com'
        ]);
    }
    /** @test */
    function campo_cedula_minimo_7_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);

        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'234982',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('cedula'); 
    }
    /** @test */
    function campo_cedula_maximo_10_caracteres_al_actualizar(){
        //$this->withoutExceptionHandling();
        factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);

        $propietario = factory(Propietario::class)->create();
        
        $this->from("propietarios/{$propietario->id}/editar")
            ->put("propietarios/{$propietario->id}",[
                    'cedula'=>'2349821234567',
                    'nombre'=>'Yeison Bladimir',
                    'direccion'=>'Una direccion normal',
                    'telefono'=>'12345678',
                    'email'=>'Yeison@correo.com'
                ])
            ->assertRedirect("propietarios/{$propietario->id}/editar")
            ->assertSessionHasErrors('cedula'); 
    }
    /** @test */
    function si_se_elimina_un_propietario(){
        $this->withoutExceptionHandling();
        $propietario = factory(Propietario::class)->create([
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);

        $this->from("propietarios")
        ->delete("propietarios/{$propietario->id}")
        ->assertRedirect("propietarios");

        $this->assertDatabaseMissing('propietarios',[
            'nombre' => 'Yeison Fuentes',
            'email' => 'Yeison@correo.com'
        ]);
    }
}
