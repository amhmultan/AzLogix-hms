<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class ManufacturerSeeder extends Seeder
{
    public function run()
    {
        $manufacturers = [
            'Alcon',
            'Allergan',
            'Sante Pharma',
            'Martin Dow',
            'Remington',
            'CCL Pharmaceuticals',
            'Kobec Health Sciences',
            'Ophth Pharma',
            'Getz Pharma',
            'Novartis',
            'Pfizer',
            'Bausch & Lomb',
            'Origin Pharma',
        ];

        foreach ($manufacturers as $name) {
            Manufacturer::firstOrCreate(['name' => $name]);
        }
    }
}
