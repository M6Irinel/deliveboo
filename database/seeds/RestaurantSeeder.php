<?php

use App\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'restaurant_address'        => 'Via Dante Alighieri 212',
                'p_iva'                     => 'IT564623181',
                'restaurant_description'    => 'Qui al ristorante da Gianluca potrai trovare un ambiente riservato e diversi tipi di cucina',
                'restaurant_phone_number'   => '3254445876',
                'restaurant_website'        => 'http//:ristorante-da-gianluca',
                'restaurant_image'          => '',
            ],
            // [
            //     'restaurant_address'        => 'Via Milano 11/A',
            //     'p_iva'                     => 'IT457895764',
            //     'restaurant_description'    => 'Qui al ristorante da Mauro potrai trovare piatti che variano da quelli tipici della tradizione alla cucina fusion',
            //     'restaurant_phone_number'   => '9876543210',
            //     'restaurant_website'        => 'http//:ristorante-da-mauro',
            //     'restaurant_image'          => '',
            // ],
            // [,
            //     'restaurant_address'        => 'Viale Bonaria 153',
            //     'p_iva'                     => 'IT961735498',
            //     'restaurant_description'    => 'Ristorante da Alessandro propone un menù variegato per soddisfare ogni tipo di palato',
            //     'restaurant_phone_number'   => '3405430191',
            //     'restaurant_website'        => 'http//:ristorante-da-alessandro',
            //     'restaurant_image'          => '',
            // ],
            // [
            //     'restaurant_address'        => 'Corso Vittorio Emanuele II 15',
            //     'p_iva'                     => 'IT457295745',
            //     'restaurant_description'    => 'Da Massimo, ristorante di nuova apertura vi invita ad assaggiare le specialità della casa!',
            //     'restaurant_phone_number'   => '3320985821',
            //     'restaurant_website'        => 'http//:ristorante-da-massimo',
            //     'restaurant_image'          => '',
            // ],
            
        ];

        $i = 1;
        foreach ($restaurants as $restaurant) {
            Restaurant::create([
                'restaurant_address'        => $restaurant['restaurant_address'],
                'user_id'                   => $i++,
                'p_iva'                     => $restaurant['p_iva'],
                'restaurant_description'    => $restaurant['restaurant_description'],
                'restaurant_phone_number'   => $restaurant['restaurant_phone_number'],
                'restaurant_website'        => $restaurant['restaurant_website'],
                'restaurant_image'          => $restaurant['restaurant_image'],
            ]);
        }
    }
}
