<?php

use App\Restaurant;
use App\Typology;
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
        $tags = Typology::all()->pluck('id');
        $restaurants = [
            [
                'restaurant_address'        => 'Via Dante 212',
                'p_iva'                     => 'IT56462331181',
                'restaurant_description'    => 'Qui al ristorante da Gianluca potrai trovare un ambiente riservato e diversi tipi di cucina',
                'restaurant_phone_number'   => '3254445876',
                'restaurant_website'        => 'http//:ristorante-da-gianluca',
                'restaurant_image'          => 'restaurant_img/da_gianluca.jpg',
                'tags' => [1,2,3]
            ],
            [
                'restaurant_address'        => 'Via Milano 11/A',
                'p_iva'                     => 'IT45789576334',
                'restaurant_description'    => 'Qui al ristorante da Mauro potrai trovare piatti che variano da quelli tipici della tradizione alla cucina fusion',
                'restaurant_phone_number'   => '9876543210',
                'restaurant_website'        => 'http//:ristorante-da-mauro',
                'restaurant_image'          => 'restaurant_img/da_mauro.jpg',
                'tags' => [4,5,6]
            ],
            [
                'restaurant_address'        => 'Viale Bonaria 153',
                'p_iva'                     => 'IT96173549822',
                'restaurant_description'    => 'Ristorante da Alessandro propone un menù variegato per soddisfare ogni tipo di palato',
                'restaurant_phone_number'   => '3405430191',
                'restaurant_website'        => 'http//:ristorante-da-alessandro',
                'restaurant_image'          => 'restaurant_img/da_alessandro.jpg',
                'tags' => [7,8]
            ],
            [
                'restaurant_address'        => 'Corso Vittorio Emanuele II 15',
                'p_iva'                     => 'IT45729574511',
                'restaurant_description'    => 'Da Massimo, ristorante di nuova apertura vi invita ad assaggiare le specialità della casa!',
                'restaurant_phone_number'   => '3320985821',
                'restaurant_website'        => 'http//:ristorante-da-massimo',
                'restaurant_image'          => 'restaurant_img/da_massimo.jpg',
                'tags' => [9,10,11]
            ],
            [
                'restaurant_address'        => 'Via Vittoria 15',
                'p_iva'                     => 'IT87416254511',
                'restaurant_description'    => 'Da Tiziano, ristorante di comprovata esperienza nella cucina moderna',
                'restaurant_phone_number'   => '3820971621',
                'restaurant_website'        => 'http//:ristorante-da-tiziano',
                'restaurant_image'          => 'restaurant_img/da_tiziano.jpg',
                'tags' => [12,13]
                
        
            ]
            
        ];

        $i = 1;
        $tags = Typology::all()->pluck('id');
  
        foreach ($restaurants as $restaurant) {
           $r= Restaurant::create([
                'restaurant_address'        => $restaurant['restaurant_address'],
                'user_id'                   => $i++,
                'p_iva'                     => $restaurant['p_iva'],
                'restaurant_description'    => $restaurant['restaurant_description'],
                'restaurant_phone_number'   => $restaurant['restaurant_phone_number'],
                'restaurant_website'        => $restaurant['restaurant_website'],
                'restaurant_image'          => $restaurant['restaurant_image'],
                

            ]);
            // $tagIds = $tags->take(4)->all();
            $r->typologies()->sync($restaurant['tags']);
        }
    }
}
