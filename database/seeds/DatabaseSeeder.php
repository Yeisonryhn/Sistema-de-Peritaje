<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncarTablas([
            'propietarios',
            'usuarios'
    	]);
    	$this->call(PropietarioSeeder::class);
        $this->call(UsuarioSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }

    protected function truncarTablas(array $tablas){

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');//CON ESTA LINEA DE CODIGO SE DESACTIVA EL CHEQUEO DE CLAVE FORANEA
    	foreach($tablas as $tabla){
    		DB::table($tabla)->truncate();//ESTE METODO ES PARA ELIMINAR TODOS LOS REGISTROS DE LA TABLA ANTES DE EJECUTAR LOS SEEDERS, PERO PARA PODER EJECUTARLO ES NECESARIO DESACTIVAR LA REVISION DE CLAVES FORANEAS, HAY QUE ANALIZAR BIEN PARA SABER SI NOS SIRVE O NO EN EL PROYECTO
    	}


    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');//ESTA LINEA PARA ACTIVARLAS
    	//EN EL CASO QUE SE DESEE ELIMINAR VARIAS TABLAS, ESTAS TRES LINEAS DE CODIGO SE PUEDEN MOVER A DatabaseSeeder
        // $this->call(UsersTableSeeder::class);
    }
}
