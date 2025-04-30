<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Media;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $chars = [
            [
                'name'        => 'Naruto Uzumaki',
                'image'       => 'https://naruto.example.com/images/naruto.png',
                'description' => 'El protagonista: un ninja optimista y determinado.',
                'media'       => ['Naruto', 'Naruto Shippûden', 'Boruto: Naruto Next Generations'],
            ],
            [
                'name'        => 'Sasuke Uchiha',
                'image'       => 'https://naruto.example.com/images/sasuke.png',
                'description' => 'Rival de Naruto, busca venganza por la destrucción de su clan.',
                'media'       => ['Naruto', 'Naruto Shippûden'],
            ],
            [
                'name'        => 'Sakura Haruno',
                'image'       => 'https://naruto.example.com/images/sakura.png',
                'description' => 'Compañera de equipo de Naruto, experta en medicina ninja.',
                'media'       => ['Naruto', 'Naruto Shippûden'],
            ],
            [
                'name'        => 'Kakashi Hatake',
                'image'       => 'https://naruto.example.com/images/kakashi.png',
                'description' => 'Sensei del Equipo 7, famoso por su Sharingan.',
                'media'       => ['Naruto', 'Naruto Shippûden', 'Boruto: Naruto Next Generations'],
            ],
        ];

        foreach ($chars as $c) {
            $character = Character::create([
                'name'        => $c['name'],
                'image'       => $c['image'],
                'description' => $c['description'],
            ]);

            // vincular con medias
            $mediaIds = Media::whereIn('title', $c['media'])->pluck('id')->toArray();
            $character->media()->sync($mediaIds);
        }
    }
}
