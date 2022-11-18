<?php

use App\Plate;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = [
            //PRIMI PIATTI
            [
                'restaurant_id' => 1,
                'plate_name' => 'Cacio e Pepe',
                'ingredients' => 'Pecorino romano e pepe',
                'plate_description' => 'Piatto tipico della tradizione romana',
                'plate_price' => 14.80,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Carbonara',
                'ingredients' => 'Guanciale affumicato, uova, grana, pecorino, pepe, olio evo',
                'plate_description' => 'Piatto tipico della tradizione romana',
                'plate_price' => 14.80,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Cozze e vongole',
                'ingredients' => 'Olio, aglio, pomodoro, cozze, vongole, basilico, prezzemolo',
                'plate_description' => 'Piatto di pasta ai frutti di mare',
                'plate_price' => 15.80,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Carbonara di mare',
                'ingredients' => 'Seppia, olio, calamaro, polpo, gamberetti, crema di zucchine, aglio, pepe',
                'plate_description' => 'Variante della carbonara fatta con i frutti di mare',
                'plate_price' => 15.80,
                'visibility' => 1,
                'plate_image' => '',
            ],
            //SUSHI
            [
                'restaurant_id' => 2,
                'plate_name' => 'Edamame',
                'ingredients' => 'Edamame',
                'plate_description' => 'Bacelli di soia in salsa piccante thai',
                'plate_price' => 4.50,
                'visibility' => 0,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Gyoza di carne',
                'ingredients' => 'Gyoza, carne di maiale',
                'plate_description' => 'Ravioli homemade di carne',
                'plate_price' => 4.50,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Sashimi mix',
                'ingredients' => 'Salmone, tonno, pesce bianco, gambero rosso, scampo',
                'plate_description' => '3pz salmone, 3pz tonno, 3pz pesce bianco, 1pz gambero, 1pz scampo',
                'plate_price' => 14.50,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Temaki maguro',
                'ingredients' => 'Tonno, avocado, uova di pesce',
                'plate_description' => 'Cono di alga nori ripieno di riso con tonno, avocado e uova di pesce',
                'plate_price' => 3.85,
                'visibility' => 0,
                'plate_image' => '',
            ],
            //PIZZA
            [
                'restaurant_id' => 1,
                'plate_name' => 'Pizza margherita',
                'ingredients' => 'Impasto tradizionale, pomodoro, mozzarella, basilico',
                'plate_description' => 'Pizza margherita',
                'plate_price' => 5.50,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Pizza tonno e cipolla',
                'ingredients' => 'impasto tradizionale, pomodoro, mozzarella, tonno, cipolla',
                'plate_description' => 'Pizza tonno e cipolla',
                'plate_price' => 7,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Pizza ai 4 formaggi',
                'ingredients' => 'Impasto tradizionale, quattro tipi di formaggio',
                'plate_description' => 'Pizza ai 4 formaggi',
                'plate_price' => 10,
                'visibility' => 0,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Focaccia',
                'ingredients' => 'Impasto tradizionale, pecorino, olio, sale, origano',
                'plate_description' => 'Focaccia semplice',
                'plate_price' => 3.50,
                'visibility' => 1,
                'plate_image' => '',
            ],
            //Poke
            [
                'restaurant_id' => 2,
                'plate_name' => 'Salmon bowl',
                'ingredients' => 'Riso bianco, salmone, avocado, alga wakame e sesamo',
                'plate_description' => 'Bowl di riso, salmone, avocado, alghe wakame e sesamo',
                'plate_price' => 11.00,
                'visibility' => 0,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Japan Special bowl',
                'ingredients' => 'Riso bianco, dadolata di salmone, tonno e gambero cotti, caviale di salmone, avocado',
                'plate_description' => 'Questa bowl con base riso bianco si ispira al chirashi tradizionale giapponese.',
                'plate_price' => 15.00,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 2,
                'plate_name' => 'Tataki bowl',
                'ingredients' => 'riso bianco, fette spesse di salmone scottato, avocado, lime, sesamo',
                'plate_description' => 'Bowl di riso bianco con fette spesse di salmone scottato in crosta di sesamo, mezzo avocado, lime, misticanza con salsa ponzu e teriyaki',
                'plate_price' => 15.00,
                'visibility' => 1,
                'plate_image' => '',
            ],
            [
                'restaurant_id' => 1,
                'plate_name' => 'Mediterraneo bowl',
                'ingredients' => 'Tonno, pomodori datterini, misticanza, stracciatella di burrata, avocado, granella di pistacchio, salsa di soia, riso bianco',
                'plate_description' => 'Bowl di riso con tataki di tonno, pomodorini datterini, misticanza, stracciatella di burrata, avocado, granella di pistacchio tostato, salsa di soia e olio evo.',
                'plate_price' => 15.00,
                'visibility' => 0,
                'plate_image' => '',
            ],
        ];

        foreach ($plates as $plate) {
            Plate::create([
                'restaurant_id'         => $plate['restaurant_id'],
                'plate_name'            => $plate['plate_name'],
                'ingredients'           => $plate['ingredients'],
                'plate_description'     => $plate['plate_description'],
                'plate_price'           => $plate['plate_price'],
                'visibility'            => $plate['visibility'],
                'plate_image'           => $plate['plate_image'],
            ]);
        }
    }
}
