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
            //PIZZERIA
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
            ]
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
