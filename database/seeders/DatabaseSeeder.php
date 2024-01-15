<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $file = fopen(base_path("database/seeders/products.csv"), "r");

        $first = true;
        while (($product = fgetcsv($file, 2000, ",")) !== false) {
            if (!$first) {
                Product::create([
                    "name" => $product['0'],
                    "price" => $product['1'],
                    "unit" => $product['2'],
                    'picture_url' => 'product.jpg'
                ]);
            }
            $first = false;
        }

        fclose($file);
    }
}
