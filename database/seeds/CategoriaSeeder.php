<?php

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert([
            ['nome' => 'Jornalista'],
            ['nome' => 'Mantenedor'],
            ['nome' => 'VIP']
        ]);
    }
}
