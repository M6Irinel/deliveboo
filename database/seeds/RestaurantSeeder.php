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
                'restaurant_address' => 'marco pollo',
                'p_iva' => 'IT564623181',
                'restaurant_description' => 'agsdfas asidfhasofhasf asdfa',
                'restaurant_phone_number' => '3254445876',
                'restaurant_website' => 'http//:trailpollo',
                'restaurant_image' => '',
            ],
            [
                'restaurant_address' => 'chi lo conosce',
                'p_iva' => 'IT457895745',
                'restaurant_description' => 'auwgfdab afueshgsegorh  serg sj',
                'restaurant_phone_number' => '9876543210',
                'restaurant_website' => 'http//:ciaoLuca',
                'restaurant_image' => '',
            ],
            // [,
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
            // ],
            // [
            //     'restaurant_address' => '',
            //     'p_iva' => '',
            //     'restaurant_description' => '',
            //     'restaurant_phone_number' => '',
            //     'restaurant_website' => '',
            //     'restaurant_image' => '',
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
