<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Manufacturer;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $eyeDrops = [
            ['Crestane', 'Polythylene glycol + Propylene glycol', 'Eye Lubricant', 'Dry Eyes', '15ml', 'Rx Needed', 'Origin Pharma'],
            ['Cemox', 'Moxifloxacin', 'Anti-Infective', 'Eye infections', '5ml', 'Rx Needed', 'Origin Pharma'],
            ['Cepat', 'Olopatadine', 'Antihistamine', 'Allergic conjunctivitis', '5ml', 'Rx Needed', 'Origin Pharma'],
            ['Toradex', 'Tobramycin + Dexamethasone', 'Combination', 'Eye infection & inflammation', '5ml', 'Rx Needed', 'Origin Pharma'],
            ['Cenac', 'Nepafenac', 'NSAID', 'Post-operative inflammation', '5ml', 'Rx Needed', 'Origin Pharma'],
            ['Locrest', 'Loteprednol Etabonate', 'Steroid', 'Anti-inflammatory eye drop', '5ml', 'Rx Needed', 'Origin Pharma'],
            ['Suretina Tablets', 'Ceratonoids with saffron', 'Antioxidant', 'Protects against oxidative stress', '30 Tablets', 'Rx Needed', 'Origin Pharma'],
            ['Liveyes Tablets', 'Ceratonoids with Minerals', 'Antioxidant', 'Protects against oxidative stress', '20 Tablets', 'Rx Needed', 'Origin Pharma'],
            ['Liveyes Syrup', 'Ceratonoids with Minerals', 'Antioxidant', 'Protects against oxidative stress', '120ml', 'Rx Needed', 'Origin Pharma'],
            ['Elevite Tablets', 'Ceratonoids with Minerals', 'Antioxidant', 'Protects against oxidative stress', '30 Tablets', 'Rx Needed', 'Origin Pharma'],
        ];

        foreach ($eyeDrops as $drop) {
            $manufacturer = Manufacturer::where('name', $drop[6])->first();

            if ($manufacturer) {
                Product::create([
                    'fk_manufacturer_id' => $manufacturer->id,
                    'name' => $drop[0],
                    'generic' => $drop[1],
                    'drug_class' => $drop[2],
                    'description' => $drop[3],
                    'pack_size' => $drop[4],
                    'status' => 1,
                    'remarks' => $drop[5],
                ]);
            }
        }
    }
}
