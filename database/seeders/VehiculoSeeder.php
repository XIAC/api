<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vehiculos')->insert([
            'user_id' => 1,
            'titulo' => 'Ejemplo titulo'.Str::random(3),
            'descripcion' => 'Ejemplo descripcion'.Str::random(3),
            'precio' => 'Ejemplo precio'.Str::random(3),
            'estado' => 'Ejemplo estado'.Str::random(3)
        ]);
        DB::table('vehiculos')->insert([
            'user_id' => 1,
            'titulo' => 'Ejemplo titulo'.Str::random(3),
            'descripcion' => 'Ejemplo descripcion'.Str::random(3),
            'precio' => 'Ejemplo precio'.Str::random(3),
            'estado' => 'Ejemplo estado'.Str::random(3)
        ]);
        DB::table('vehiculos')->insert([
            'user_id' => 1,
            'titulo' => 'Ejemplo titulo'.Str::random(3),
            'descripcion' => 'Ejemplo descripcion'.Str::random(3),
            'precio' => 'Ejemplo precio'.Str::random(3),
            'estado' => 'Ejemplo estado'.Str::random(3)
        ]);
    }
}
