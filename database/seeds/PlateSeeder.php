<?php

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
            [
                'plate_name' => 'Pasta alla carbonara',
                'ingridients' => 'Uova, pecorino, guanciale, pasta all\'uovo',
                'plate_description' => 'Piatto della tradizione romana',
                'plate_price' => 15,
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
