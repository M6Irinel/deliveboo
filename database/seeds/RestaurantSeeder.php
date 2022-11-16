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
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
            [
                'restaurant_name' => '',
                'restaurant_address' => '',
                'p_iva' => '',
                'restaurant_description' => '',
                'restaurant_phone_number' => '',
                'restaurant_website' => '',
                'restaurant_image' => '',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create([
                'restaurant_name'           => $restaurant['restaurant_name'],
                'restaurant_address'        => $restaurant['restaurant_address'],
                'p_iva'                     => $restaurant['p_iva'],
                'restaurant_description'    => $restaurant['restaurant_description'],
                'restaurant_phone_number'   => $restaurant['restaurant_phone_number'],
                'restaurant_website'        => $restaurant['restaurant_website'],
                'restaurant_image'          => $restaurant['restaurant_image'],
            ]);
        }
    }
}
