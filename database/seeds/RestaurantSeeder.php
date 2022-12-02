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
                'restaurant_address'        => 'Via Dante 212',
                'p_iva'                     => 'IT56462331181',
                'restaurant_description'    => 'Qui al ristorante da Gianluca potrai trovare un ambiente riservato e diversi tipi di cucina',
                'restaurant_phone_number'   => '+39 3254445876',
                'restaurant_website'        => 'http://ristorante-da-gianluca',
                'restaurant_image'          => 'restaurant_img/da_gianluca.jpg',
                'tags'                      => [1,2,3]
            ],
            [
                'restaurant_address'        => 'Via Milano 11/A',
                'p_iva'                     => 'IT45789576334',
                'restaurant_description'    => 'Qui al ristorante da Mauro potrai trovare piatti che variano da quelli tipici della tradizione alla cucina fusion',
                'restaurant_phone_number'   => '+39 3476543210',
                'restaurant_website'        => 'http://ristorante-da-mauro',
                'restaurant_image'          => 'restaurant_img/da_mauro.jpg',
                'tags'                      => [4,5,6]
            ],
            [
                'restaurant_address'        => 'Viale Bonaria 153',
                'p_iva'                     => 'IT96173549822',
                'restaurant_description'    => 'Ristorante da Alessandro propone un menù variegato per soddisfare ogni tipo di palato',
                'restaurant_phone_number'   => '+39 3405430191',
                'restaurant_website'        => 'http://ristorante-da-alessandro',
                'restaurant_image'          => 'restaurant_img/da_alessandro.jpg',
                'tags'                      => [7,8]
            ],
            [
                'restaurant_address'        => 'Corso Vittorio Emanuele II 15',
                'p_iva'                     => 'IT45729574511',
                'restaurant_description'    => 'Da Massimo, ristorante di nuova apertura vi invita ad assaggiare le specialità della casa!',
                'restaurant_phone_number'   => '+39 3820985821',
                'restaurant_website'        => 'http://ristorante-da-massimo',
                'restaurant_image'          => 'restaurant_img/da_massimo_serio.jpg',
                'tags'                      => [9,10,11]
            ],
            [
                'restaurant_address'        => 'Via Vittoria 15',
                'p_iva'                     => 'IT87416254511',
                'restaurant_description'    => 'Da Tiziano, ristorante di comprovata esperienza nella cucina moderna',
                'restaurant_phone_number'   => '+39 3820971621',
                'restaurant_website'        => 'http://ristorante-da-tiziano',
                'restaurant_image'          => 'restaurant_img/da_tiziano.jpg',
                'tags'                      => [12,13]
            ],
            [
                'restaurant_address'        => 'Corso Vittorio Emanuele II 1',
                'p_iva'                     => 'IT45765474511',
                'restaurant_description'    => 'Osteria ormai affermata sul territorio, da adesso effettua consegne a domicilio!',
                'restaurant_phone_number'   => '+39 3870985821',
                'restaurant_website'        => 'http://osteria-del-borgo',
                'restaurant_image'          => 'restaurant_img/trattoria.webp',
                'tags'                      => [1,6,12]
            ],
            [
                'restaurant_address'        => 'Via Carlini 14',
                'p_iva'                     => 'IT46079574511',
                'restaurant_description'    => 'Forno dalla tradizione decennale adesso disponibile al servizio da asporto.',
                'restaurant_phone_number'   => '+39 3263145821',
                'restaurant_website'        => 'http://forno-del-vicolo',
                'restaurant_image'          => 'restaurant_img/forno_del_vicolo.jpg',
                'tags'                      => [3,12]
            ],
            [
                'restaurant_address'        => 'Via degli Sviluppatori 9',
                'p_iva'                     => 'IT45741574511',
                'restaurant_description'    => 'Ristorante specializzato nella cottura di carni con cucina a vista',
                'restaurant_phone_number'   => '+39 3482485821',
                'restaurant_website'        => 'http://bottega-della-carne',
                'restaurant_image'          => 'restaurant_img/Braceria-Bifulco.jpg',
                'tags'                      => [5,6,9]
            ],
        ];

        $i = 1;
        foreach ($restaurants as $r) {
           $n = Restaurant::create([
                'restaurant_address'        => $r['restaurant_address'],
                'user_id'                   => $i++,
                'p_iva'                     => $r['p_iva'],
                'restaurant_description'    => $r['restaurant_description'],
                'restaurant_phone_number'   => $r['restaurant_phone_number'],
                'restaurant_website'        => $r['restaurant_website'],
                'restaurant_image'          => $r['restaurant_image'],
            ]);
            $n->typologies()->sync($r['tags']);
        }
    }
}
