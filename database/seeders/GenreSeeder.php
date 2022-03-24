<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Genre::truncate();

        $genres =  [
            [
                'type' => 'Romance',
            ],
            [
                'type' => 'Crime',
            ],
            [
                'type' => 'Fantasy',
            ],
            [
                'type' => 'Documentary',
            ],
            [
                'type' => 'Thriller',
            ],
            [
                'type' => 'Action',
            ],
            [
                'type' => 'Drama',
            ],
            [
                'type' => 'Horror',
            ],
            [
                'type' => 'Comedy',
            ]
          ];
          foreach($genres as $genre)
          {
            Genre::create($genre);
          }
    }
}
