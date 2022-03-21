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
        Movie::truncate();

        $movies =  [
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'cover_image' => 'https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600/',
                'genre' => Movie::MOVIE_GENRE_DRAMA,
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty in postwar New York City transfers control of his clandestine empire to his reluctant youngest son.',
                'cover_image' => 'https://www.imdb.com/title/tt0068646/mediaviewer/rm746868224/',
                'genre' => Movie::MOVIE_GENRE_CRIME,
            ],
            [
                'title' => 'The Godfather: Part II',
                'description' => 'The early life and career of Vito Corleone in 1920s New York City is portrayed, while his son, Michael, expands and tightens his grip on the family crime syndicate.',
                'cover_image' => 'https://www.imdb.com/title/tt0071562/mediaviewer/rm4159262464/',
                'genre' => Movie::MOVIE_GENRE_CRIME,
            ],
            [
                'title' => 'Forrest Gump',
                'description' => 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
                'cover_image' => 'https://www.imdb.com/title/tt0109830/mediaviewer/rm1954748672/',
                'genre' => Movie::MOVIE_GENRE_ROMANCE,
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.',
                'cover_image' => 'https://www.imdb.com/title/tt1375666/mediaviewer/rm3426651392/',
                'genre' => Movie::MOVIE_GENRE_ACTION,
            ],
            [
                'title' => 'The Matrix',
                'description' => 'When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.',
                'cover_image' => 'https://www.imdb.com/title/tt0133093/mediaviewer/rm525547776/',
                'genre' => Movie::MOVIE_GENRE_FANTASY,
            ],
            [
                'title' => 'Scary Movie',
                'description' => 'A year after disposing of the body of a man they accidentally killed, a group of dumb teenagers are stalked by a bumbling serial killer.',
                'cover_image' => 'https://www.imdb.com/title/tt0175142/mediaviewer/rm3954579456/',
                'genre' => Movie::MOVIE_GENRE_COMEDY,
            ],
            [
                'title' => 'American Horror Story',
                'description' => 'An anthology series centering on different characters and locations, including a house with a murderous past, an insane asylum, a witch coven, a freak show circus, a haunted hotel, a possessed farmhouse, a cult, the apocalypse, a slasher summer camp, and a bleak beach town and desert valley.',
                'cover_image' => 'https://www.imdb.com/title/tt1844624/mediaviewer/rm2005112065/',
                'genre' => Movie::MOVIE_GENRE_HORROR,
            ],
            [
                'title' => 'Woody Allen: A Documentary',
                'description' => 'A documentary on Woody Allen that trails him on his movie sets and follows him back to Brooklyn as he visits his childhood haunts.',
                'cover_image' => 'https://www.imdb.com/title/tt1895299/mediaviewer/rm3545935104/',
                'genre' => Movie::MOVIE_GENRE_DOCUMENTARY,
            ],
            [
                'title' => 'The Departed',
                'description' => 'An undercover cop and a mole in the police attempt to identify each other while infiltrating an Irish gang in South Boston.',
                'cover_image' => 'https://www.imdb.com/title/tt0407887/mediaviewer/rm981113088/',
                'genre' => Movie::MOVIE_GENRE_THRILLER,
            ],
          ];
          foreach($movies as $movie)
          {
            Movie::create($movie);
          }
    }
}
