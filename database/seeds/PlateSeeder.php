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
                'plate_name' => 'Cacio e Pepe',
                'ingridients' => 'Pecorino romano e pepe',
                'plate_description' => 'Piatto tipico della tradizione romana',
                'plate_price' => 14.80,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Carbonara',
                'ingridients' => 'Guanciale affumicato, uova, grana, pecorino, pepe, olio evo',
                'plate_description' => 'Piatto tipico della tradizione romana',
                'plate_price' => 14.80,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Cozze e vongole',
                'ingridients' => 'Olio, aglio, pomodoro, cozze, vongole, basilico, prezzemolo',
                'plate_description' => 'Piatto di pasta ai frutti di mare',
                'plate_price' => 15.80,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Carbonara di mare',
                'ingridients' => 'Seppia, olio, calamaro, polpo, gamberetti, crema di zucchine, aglio, pepe',
                'plate_description' => 'Variante della carbonara fatta con i frutti di mare',
                'plate_price' => 15.80,
                'visibility' => true,
                'plate_image' => '',
            ],
            //SUSHI
            [
                'plate_name' => 'Edamame',
                'ingridients' => 'Edamame',
                'plate_description' => 'Bacelli di soia in salsa piccante thai',
                'plate_price' => 4.50,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Gyoza di carne',
                'ingridients' => 'Gyoza, carne di maiale',
                'plate_description' => 'Ravioli homemade di carne',
                'plate_price' => ,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Sashimi mix',
                'ingridients' => 'Salmone, tonno, pesce bianco, gambero rosso, scampo',
                'plate_description' => '3pz salmone, 3pz tonno, 3pz pesce bianco, 1pz gambero, 1pz scampo',
                'plate_price' => 14.50,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Temaki maguro',
                'ingridients' => 'Tonno, avocado, uova di pesce',
                'plate_description' => 'Cono di alga nori ripieno di riso con tonno, avocado e uova di pesce',
                'plate_price' => 3.85,
                'visibility' => true,
                'plate_image' => '',
            ],
            //PIZZA
            [
                'plate_name' => 'Pizza margherita',
                'ingridients' => 'Impasto tradizionale, pomodoro, mozzarella, basilico',
                'plate_description' => 'Pizza margherita',
                'plate_price' => 5.50,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Pizza tonno e cipolla',
                'ingridients' => 'impasto tradizionale, pomodoro, mozzarella, tonno, cipolla',
                'plate_description' => 'Pizza tonno e cipolla',
                'plate_price' => 7,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Pizza ai 4 formaggi',
                'ingridients' => 'Impasto tradizionale, quattro tipi di formaggio',
                'plate_description' => 'Pizza ai 4 formaggi',
                'plate_price' => 10,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Focaccia',
                'ingridients' => 'Impasto tradizionale, pecorino, olio, sale, origano',
                'plate_description' => 'Focaccia semplice',
                'plate_price' => 3.50,
                'visibility' => true,
                'plate_image' => '',
            ],
            //Poke
            [
                'plate_name' => 'Salmon bowl',
                'ingridients' => 'Riso bianco, salmone, avocado, alga wakame e sesamo',
                'plate_description' => 'Bowl di riso, salmone, avocado, alghe wakame e sesamo',
                'plate_price' => 11.00,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Japan Special bowl',
                'ingridients' => 'Riso bianco, dadolata di salmone, tonno e gambero cotti, caviale di salmone, avocado',
                'plate_description' => 'Questa bowl con base riso bianco si ispira al chirashi tradizionale giapponese.',
                'plate_price' => 15.00,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Tataki bowl',
                'ingridients' => 'riso bianco, fette spesse di salmone scottato, avocado, lime, sesamo',
                'plate_description' => 'Bowl di riso bianco con fette spesse di salmone scottato in crosta di sesamo, mezzo avocado, lime, misticanza con salsa ponzu e teriyaki',
                'plate_price' => 15.00,
                'visibility' => true,
                'plate_image' => '',
            ],
            [
                'plate_name' => 'Mediterraneo bowl',
                'ingridients' => 'Tonno, pomodori datterini, misticanza, stracciatella di burrata, avocado, granella di pistacchio, salsa di soia, riso bianco',
                'plate_description' => 'Bowl di riso con tataki di tonno, pomodorini datterini, misticanza, stracciatella di burrata, avocado, granella di pistacchio tostato, salsa di soia e olio evo.',
                'plate_price' => 15.00,
                'visibility' => true,
                'plate_image' => '',
            ],
        ];
        
        foreach ($plates as $plate) {
            Plate::create([
                'plate_name'            => $plate['plate_name'],
                'ingridients'           => $plate['ingridients'],
                'plate_description'     => $plate['plate_description'],
                'plate_price'           => $plate['plate_price'],
                'visibility'            => $plate['visibility'],
                'plate_image'           => $plate['plate_image'],
            ]);
        }
    }
}
