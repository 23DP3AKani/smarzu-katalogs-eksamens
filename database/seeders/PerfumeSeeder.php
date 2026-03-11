<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfume;

class PerfumeSeeder extends Seeder
{
    public function run()
    {
        $perfumes = [
            [
                'name' => 'Sauvage',
                'brand' => 'Dior',
                'image_url' => 'https://placehold.co/300x400?text=Dior+Sauvage',
                'short_description' => 'Svaigs un spēcīgs aromāts īstiem vīriešiem.',
                'gender' => 'vīriešiem',
                'season' => 'vissezonas',
            ],
            [
                'name' => 'Light Blue',
                'brand' => 'Dolce & Gabbana',
                'image_url' => 'https://placehold.co/300x400?text=Light+Blue',
                'short_description' => 'Viegls, citrusu aromāts, kas atsauc atmiņā vasaru.',
                'gender' => 'sievietēm',
                'season' => 'vasarai',
            ],
            [
                'name' => 'Tobacco Vanille',
                'brand' => 'Tom Ford',
                'image_url' => 'https://placehold.co/300x400?text=Tobacco+Vanille',
                'short_description' => 'Silts, pikants un salds aromāts vēsajiem vakariem.',
                'gender' => 'unisex',
                'season' => 'ziemai',
            ],
            [
                'name' => 'Baccarat Rouge 540',
                'brand' => 'Maison Francis Kurkdjian',
                'image_url' => 'https://placehold.co/300x400?text=Baccarat+Rouge',
                'short_description' => 'Grezns un neatkārtojams ziedu un koksnes aromāts.',
                'gender' => 'unisex',
                'season' => 'vissezonas',
            ],
            [
                'name' => 'Eros',
                'brand' => 'Versace',
                'image_url' => 'https://placehold.co/300x400?text=Versace+Eros',
                'short_description' => 'Kaislīgs un spilgts aromāts, ideāli piemērots rudenim.',
                'gender' => 'vīriešiem',
                'season' => 'rudenim',
            ],
        ];

        foreach ($perfumes as $perfume) {
            Perfume::create($perfume);
        }
    }
}