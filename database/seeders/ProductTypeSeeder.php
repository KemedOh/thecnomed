<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    private $product_types = [
        ["e-wallet", "E-wallet"],
        ["sembako", "Sembako"],
        ["pakaian", "Pakaian"],
        ["aksesoris", "Aksesoris"],
    ];
    public function run(): void
    {
        foreach ($this->product_types as $product_type) {
            \App\Models\Product_Type::create([
                #  "id" => $role[0],
                "product_type_name" => $product_type[1],
            ]);
        }
    }
}
