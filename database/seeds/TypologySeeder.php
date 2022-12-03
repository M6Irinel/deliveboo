<?php

use App\Typology;
use Illuminate\Database\Seeder;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            [
                "Tipologia" => "Primo",
                "Immagine"  => "primo.png",
            ],
            [
                "Tipologia" => "Sushi",
                "Immagine"  => "sushi.png",
            ],
            [
                "Tipologia" => "Pizza",
                "Immagine"  => "pizza.png",
            ],
            [
                "Tipologia" => "Poke",
                "Immagine"  => "poke.png",
            ],
            [
                "Tipologia" => "Kebab",
                "Immagine"  => "kebab.png",
            ],
            [
                "Tipologia" => "Burger",
                "Immagine"  => "burger.png",
            ],
            [
                "Tipologia" => "Veg",
                "Immagine"  => "veg.png",
            ],
            [
                "Tipologia" => "Pesce",
                "Immagine"  => "pesce.png",
            ],
            [
                "Tipologia" => "Carne",
                "Immagine"  => "carne.png",
            ],
            [
                "Tipologia" => "Indiano",
                "Immagine"  => "indiano.png",
            ],
            [
                "Tipologia" => "Messicano",
                "Immagine"  => "messicano.png",
            ],
            [
                "Tipologia" => "Dolci",
                "Immagine"  => "dolci.png",
            ],
            [
                "Tipologia" => "Gelato",
                "Immagine"  => "gelato.png",
            ],
        ];

        foreach ($typologies as $t) {
            Typology::create([
                "name"  => $t["Tipologia"],
                "image" => $t["Immagine"],
            ]);
        }
    }
}
