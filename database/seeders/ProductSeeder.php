<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();

        Product::create([
            'category_id' => 1,
            'name'        => 'Laptop',
            'price'       => '25000.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'laptop.jpeg',
        ]);

        Product::create([
            'category_id' => 1,
            'name'        => 'Mobile',
            'price'       => '18000.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'mobile.jpeg',
        ]);

        Product::create([
            'category_id' => 1,
            'name'        => 'Television',
            'price'       => '32000.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'television.jpeg',
        ]);

        Product::create([
            'category_id' => 2,
            'name'        => 'Car',
            'price'       => '500000.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'car.jpeg',
        ]);

        Product::create([
            'category_id' => 2,
            'name'        => 'Bike',
            'price'       => '80000.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'bike.jpeg',
        ]);

        Product::create([
            'category_id' => 3,
            'name'        => 'Mango',
            'price'       => '50.00',
            'description' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable',
            'image'       => 'mango.jpeg',
        ]);
    }
}
