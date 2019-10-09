<?php

use Illuminate\Database\Seeder;

class VehicleMakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'Alfa Romeo',
            'AMC',
            'Aston Martin',
            'Aud',
            'Avant',
            'Bentley',
            'BMW',
            'Buick',
            'Cadillac',
            'Chevrolet',
            'Chrysler',
            'Daewoo',
            'Daihatsu',
            'Datsun',
            'DeLorean',
            'Dodge',
            'Eagle',
            'Ferrari',
            'FIAT',
            'Fisker',
            'Ford',
            'Freightliner',
            'Geo',
            'GMC',
            'Honda',
            'HUMMER',
            'Hyundai',
            'Infiniti',
            'Isuzu',
            'Jaguar',
            'Jeep',
            'Kia',
            'Lamborghini',
            'Lancia',
            'Land Rover',
            'Lexus',
            'Lincoln',
            'Lotus',
            'Maserati',
            'Maybach',
            'Mazda',
            'McLaren',
            'Mercedes-Benz',
            'Mercury',
            'Merkur',
            'MINI',
            'Mitsubishi',
            'Nissan',
            'Oldsmobile',
            'Peugeot',
            'Plymouth',
            'Pontiac',
            'Porsche',
            'RAM',
            'Renault',
            'Rolls-Royce',
            'Saab',
            'Saturn',
            'Scion',
            'smart',
            'SRT',
            'Sterling',
            'Subaru',
            'Suzuki',
            'Tesla',
            'Toyota',
            'Triumph',
            'Volkswagen',
            'Volvo',
            'Yugo'
        ];
        foreach ($data as $name) {
            factory(App\VehicleMaker::class, 1)->create([
                'name' => $name
            ]);
        }
    }
}
