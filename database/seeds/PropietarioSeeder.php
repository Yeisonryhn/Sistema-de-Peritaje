<?php

use Illuminate\Database\Seeder;
use App\Propietario;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Propietario::class,10)->create();
    }
}
