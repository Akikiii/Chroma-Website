<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ColorsTableSeeder extends Seeder
{
    /**
     *php artisan db:seed --class=ColorsTableSeeder

     */
    public function run()
{
    $colors = [ 
        [
            'name' => 'Pastel Orange',
            'hex' => '#FFB347',
            'red' => 255,
            'green' => 179,
            'blue' => 71,
        ], //1
        [
            'name' => 'Pastel Red',
            'hex' => '#FF6961',
            'red' => 255,
            'green' => 105,
            'blue' => 97,
        ], //2
        [
            'name' => 'Pink',
            'hex' => '#FFC0CB',
            'red' => 255,
            'green' => 192,
            'blue' => 203,
        ], //3
        [
            'name' => 'Neon Pink',
            'hex' => '#FF6EC7',
            'red' => 255,
            'green' => 110,
            'blue' => 199,
        ], //4
        [
            'name' => 'Neon Orange',
            'hex' => '#FFA343',
            'red' => 255,
            'green' => 163,
            'blue' => 67,
        ],// 5
        [
            'name' => 'Orange',
            'hex' => '#FFA500',
            'red' => 255,
            'green' => 165,
            'blue' => 0,
        ], //7
        [
            'name' => 'Brilliant Red',
            'hex' => '#FF0000',
            'red' => 255,
            'green' => 0,
            'blue' => 0,
        ],
        [
            'name' => 'Magenta',
            'hex' => '#FF00FF',
            'red' => 255,
            'green' => 0,
            'blue' => 255,
        ],
        [
            'name' => 'Titanium White',
            'hex' => '#FFFFFF',
            'red' => 255,
            'green' => 255,
            'blue' => 255,
        ],
        [
            'name' => 'Pastel Yellow',
            'hex' => '#FDFD96',
            'red' => 253,
            'green' => 253,
            'blue' => 150,
        ],
        [
            'name' => 'Yellow Pale',
            'hex' => '#FAFAD2',
            'red' => 250,
            'green' => 250,
            'blue' => 210,
        ],
        [
            'name' => 'Lemon Yellow',
            'hex' => '#FFF44F',
            'red' => 255,
            'green' => 244,
            'blue' => 79,
        ],
        [
            'name' => 'Pearlescent Yellow',
            'hex' => '#FADA5E',
            'red' => 250,
            'green' => 218,
            'blue' => 94,
        ],
        [
            'name' => 'Neon Yellow',
            'hex' => '#FFFF00',
            'red' => 255,
            'green' => 255,
            'blue' => 0,
        ],
        [
            'name' => 'Gold',
            'hex' => '#FFD700',
            'red' => 255,
            'green' => 215,
            'blue' => 0,
        ],
        [
            'name' => 'Yellow Ochre',
            'hex' => '#CC7722',
            'red' => 204,
            'green' => 119,
            'blue' => 34,
        ],
        [
            'name' => 'Viridian',
            'hex' => '#40826D',
            'red' => 64,
            'green' => 130,
            'blue' => 109,
        ],
        [
            'name' => 'Grass Green',
            'hex' => '#4CAF50',
            'red' => 76,
            'green' => 175,
            'blue' => 80,
        ],
        [
            'name' => 'Neon Green',
            'hex' => '#39FF14',
            'red' => 57,
            'green' => 255,
            'blue' => 20,
        ],
        [
            'name' => 'Green Mid',
            'hex' => '#4D8C57',
            'red' => 77,
            'green' => 140,
            'blue' => 87,
        ],
        [
            'name' => 'Pastel Green',
            'hex' => '#77DD77',
            'red' => 119,
            'green' => 221,
            'blue' => 119,
        ],
        [
            'name' => 'Neon Blue',
            'hex' => '#4D4DFF',
            'red' => 77,
            'green' => 77,
            'blue' => 255,
        ],
        [
            'name' => 'Ultramarine Blue',
            'hex' => '#120A8F',
            'red' => 18,
            'green' => 10,
            'blue' => 143,
        ],
        [
            'name' => 'Phthalo Blue',
            'hex' => '#000F89',
            'red' => 0,
            'green' => 15,
            'blue' => 137,
        ],
        [
            'name' => 'Pearlescent Blue',
            'hex' => '#3F6EAA',
            'red' => 63,
            'green' => 110,
            'blue' => 170,
        ],
        [
            'name' => 'Pastel Blue',
            'hex' => '#AED6F1',
            'red' => 174,
            'green' => 214,
            'blue' => 241,
        ],
        [
            'name' => 'Pastel Pink',
            'hex' => '#FFD1DC',
            'red' => 255,
            'green' => 209,
            'blue' => 220,
        ],
        [
            'name' => 'Pastel Purple',
            'hex' => '#B19CD9',
            'red' => 177,
            'green' => 156,
            'blue' => 217,
        ],
        [
            'name' => 'Purple',
            'hex' => '#800080',
            'red' => 128,
            'green' => 0,
            'blue' => 128,
        ],
        [
            'name' => 'Neon Purple',
            'hex' => '#BF00FF',
            'red' => 191,
            'green' => 0,
            'blue' => 255,
        ],
        [
            'name' => 'Rose Red',
            'hex' => '#C21E56',
            'red' => 194,
            'green' => 30,
            'blue' => 86,
        ],
        [
            'name' => 'Pastel Grey',
            'hex' => '#CFCFC4',
            'red' => 207,
            'green' => 207,
            'blue' => 196,
        ],
        [
            'name' => 'Silver',
            'hex' => '#C0C0C0',
            'red' => 192,
            'green' => 192,
            'blue' => 192,
        ],
        [
            'name' => 'Burnt Sienna',
            'hex' => '#E97451',
            'red' => 233,
            'green' => 116,
            'blue' => 81,
        ],
        [
            'name' => 'Burnt Umber',
            'hex' => '#8A3324',
            'red' => 138,
            'green' => 51,
            'blue' => 36,
        ],
        [
            'name' => 'Black',
            'hex' => '#000000',
            'red' => 0,
            'green' => 0,
            'blue' => 0,
        ],
        [
            'name' => 'Pearlescent Green',
            'hex' => '#00A693',
            'red' => 0,
            'green' => 166,
            'blue' => 147,
        ],
        [
            'name' => 'Pearlescent Rose',
            'hex' => '#E38AAE',
            'red' => 227,
            'green' => 138,
            'blue' => 174,
        ],
        [
            'name' => 'Pearlescent Red',
            'hex' => '#AA4069',
            'red' => 170,
            'green' => 64,
            'blue' => 105,
        ],
        [
            'name' => 'Pearlescent Purple',
            'hex' => '#9370DB',
            'red' => 147,
            'green' => 112,
            'blue' => 219,
        ],
        [
            'name' => 'Glitter Crystal',
            'hex' => '#E6E8FA',
            'red' => 230,
            'green' => 232,
            'blue' => 250,
        ],
        [
            'name' => 'Glitter Silver',
            'hex' => '#CECFD2',
            'red' => 206,
            'green' => 207,
            'blue' => 210,
        ],
        [
            'name' => 'Glitter Blue',
            'hex' => '#0000FF',
            'red' => 0,
            'green' => 0,
            'blue' => 255,
        ],
        [
            'name' => 'Glitter Gold',
            'hex' => '#DFB722',
            'red' => 223,
            'green' => 183,
            'blue' => 34,
        ],
        [
            'name' => 'Glitter Green',
            'hex' => '#00FF00',
            'red' => 0,
            'green' => 255,
            'blue' => 0,
        ],
        [
            'name' => 'Glitter Pink',
            'hex' => '#FF69B4',
            'red' => 255,
            'green' => 105,
            'blue' => 180,
        ],
        [
            'name' => 'Glitter Red',
            'hex' => '#F15461',
            'red' => 241,
            'green' => 84,
            'blue' => 97,
        ],
        [
            'name' => 'Glitter Purple',
            'hex' => '#8E3FE2',
            'red' => 142,
            'green' => 63,
            'blue' => 225,
        ],
    
    ];

    DB::table('colors')->insert($colors);
}

}
