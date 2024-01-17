<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $file = fopen(base_path("database/seeders/categories.csv"), "r");

        $first = true;
        while (($row = fgetcsv($file, 2000, ",")) !== false) {
            if (!$first) {
                Category::create([
                    "name" => $row['0'],
                ]);
            }
            $first = false;
        }

        fclose($file);

        $file = fopen(base_path("database/seeders/products.csv"), "r");

        $first = true;
        while (($row = fgetcsv($file, 2000, ",")) !== false) {
            if (!$first) {
                Product::create([
                    "name" => $row['0'],
                    "unit" => $row['2'],
                    "price" => $row['1'],
                    "stock" => rand(0, 60),
                    'picture_url' => 'product.jpg',
                    'category_id' => $row['3'],
                ]);
            }
            $first = false;
        }

        fclose($file);
    }
}
