<?php

use Illuminate\Database\Seeder;

class VehicleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['underfined','MICRO', 'SEDAN', 'CUV', 'SUV', 'MINIVAN', 'HATCHBACK', 'ROADSTER', 'PICKUP', 'VAN', 'COUP', 'TRUCK', 'BIG TRUCK'];
        //
        foreach ($data as $name) {
            factory(App\VehicleCategory::class, 1)->create([
                'name' => $name
            ]);
        }
    }
}
