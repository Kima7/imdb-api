<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Movie::truncate();

        $movies =  [
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'cover_image' => 'https://i.ytimg.com/vi/19THOH_dvxg/movieposter_en.jpg',
                'genre_id' => 7,
                'visited_count' => 0,
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty in postwar New York City transfers control of his clandestine empire to his reluctant youngest son.',
                'cover_image' => 'https://upload.wikimedia.org/wikipedia/en/a/af/The_Godfather%2C_The_Game.jpg',
                'genre_id' => 2,
                'visited_count' => 0,
            ],
            [
                'title' => 'The Godfather: Part II',
                'description' => 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.',
                'cover_image' => 'https://m.media-amazon.com/images/I/513F0h46t4L._SX342_.jpg',
                'genre_id' => 2,
                'visited_count' => 0,
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
                'cover_image' => 'https://flxt.tmsimg.com/assets/p15829_p_v8_as.jpg',
                'genre_id' => 1,
                'visited_count' => 0,
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.',
                'cover_image' => 'https://i1.sndcdn.com/artworks-M8sixZ5Kw7M7Ev8k-LRujGw-t500x500.jpg',
                'genre_id' => 6,
                'visited_count' => 0,
            ],
            [
                'title' => 'The Matrix',
                'description' => 'When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.',
                'cover_image' => 'https://www.indiewire.com/wp-content/uploads/2020/09/the-matrix.png',
                'genre_id' => 3,
                'visited_count' => 0,
            ],
            [
                'title' => 'Scary Movie',
                'description' => 'A year after disposing of the body of a man they accidentally killed, a group of dumb teenagers are stalked by a bumbling serial killer.',
                'cover_image' => 'https://flxt.tmsimg.com/assets/p25765_p_v13_ah.jpg',
                'genre_id' => 9,
                'visited_count' => 0,
            ],
            [
                'title' => 'American Horror Story',
                'description' => 'An anthology series centering on different characters and locations, including a house with a murderous past, an insane asylum, a witch coven, a freak show circus, a haunted hotel, a possessed farmhouse, a cult, the apocalypse, a slasher summer camp, and a bleak beach town and desert valley.',
                'cover_image' => 'https://flxt.tmsimg.com/assets/p8807210_b_v8_ao.jpg',
                'genre_id' => 8,
                'visited_count' => 0,
            ],
            [
                'title' => 'Woody Allen: A Documentary',
                'description' => 'A documentary on Woody Allen that trails him on his movie sets and follows him back to Brooklyn as he visits his childhood haunts.',
                'cover_image' => 'https://images-na.ssl-images-amazon.com/images/S/pv-target-images/2304fc82378c21c4fc865befe8c6af3073ae814c61a53361935c85c65ea4ff8f._UY500_UX667_RI_V_TTW_.jpg',
                'genre_id' => 4,
                'visited_count' => 0,
            ],
            [
                'title' => 'The Departed',
                'description' => 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.',
                'cover_image' => 'https://dailynationtoday.com/wp-content/uploads/2021/10/Departed-e1633146591556.jpg',
                'genre_id' => 5,
                'visited_count' => 0,
            ],
        ];
        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
