<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Primero seed de medias, luego personajes
        $this->call([
            MediaSeeder::class,
            CharacterSeeder::class,
        ]);
    }
}
