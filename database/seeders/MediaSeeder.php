<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;
use Carbon\Carbon;

class MediaSeeder extends Seeder
{
    public function run()
    {
        $media = [
            [
                'title'          => 'Naruto',
                'classification' => 'Acción/Aventura',
                'release_date'   => Carbon::create(2002, 10, 3),
                'review'         => 'La historia de un joven ninja que busca reconocimiento y sueña con convertirse en Hokage.',
                'season'         => null,
            ],
            [
                'title'          => 'Naruto Shippûden',
                'classification' => 'Acción',
                'release_date'   => Carbon::create(2007, 2, 15),
                'review'         => 'Continuación de Naruto: busca rescatar a Sasuke mientras enfrenta nuevas amenazas.',
                'season'         => null,
            ],
            [
                'title'          => 'Boruto: Naruto Next Generations',
                'classification' => 'Acción',
                'release_date'   => Carbon::create(2017, 4, 5),
                'review'         => 'Naruto ya es Hokage y la historia se centra en la nueva generación de ninjas.',
                'season'         => 1,
            ],
        ];

        foreach ($media as $item) {
            Media::create($item);
        }
    }
}
