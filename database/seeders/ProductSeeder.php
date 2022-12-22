<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'title' => 'Mie Ayam',
            'description' => 'Mie ayam is a satisfying and flavorful meal that is enjoyed by people of all ages in Indonesia and beyond.',
            'price' => 7,
            'imagePath' => 'https://images.unsplash.com/photo-1641673226915-67ac3ee404c2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3674&q=80'
        ]);
        $product->save();
        $product = new Product([
            'title' => 'Nasi Goreng',
            'description' => 'Nasi goreng is a delicious and flavorful meal that is enjoyed by people of all ages in Indonesia and beyond.',
            'price' => 9,
            'imagePath' => 'https://images.unsplash.com/photo-1668665771959-b217076ddde3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2600&q=80'
        ]);
        $product->save();
        $product = new Product([
            'title' => 'Kentang Goreng',
            'description' => 'Kentang goreng is a delicious and satisfying snack that is enjoyed by people of all ages in Indonesia and beyond.',
            'price' => 5,
            'imagePath' => 'https://images.unsplash.com/photo-1639744091981-2f826321fae6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80'
        ]);
        $product->save();
        $product = new Product([
            'title' => 'Kopi',
            'description' => 'It is a popular drink for socializing and relaxing, and is also a source of caffeine, which is a stimulant that can improve alertness and focus.',
            'price' => 3,
            'imagePath' => 'https://images.unsplash.com/photo-1664455126548-f7022839c269?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3376&q=80'
        ]);
        $product->save();
        $product = new Product([
            'title' => 'Es Teh',
            'description' => 'It is also a popular choice for home-cooked meals and is often served as a refreshing accompaniment to a variety of dishes.',
            'price' => 3,
            'imagePath' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2899&q=80'
        ]);
        $product->save();
        $product = new Product([
            'title' => 'Soto',
            'description' => 'It is also a popular choice for home-cooked meals and is often served as a comforting and nourishing dish.',
            'price' => 10,
            'imagePath' => 'https://images.unsplash.com/photo-1572656306390-40a9fc3899f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3456&q=80'
        ]);
        $product->save();
    }
}
