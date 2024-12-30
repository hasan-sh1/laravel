<?php

namespace Database\Seeders;

use App\Models\Puzzle;
use App\Models\Product;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        Puzzle::create([
            'question' => 'ما هو الشيء الذي يزداد كلما أخذت منه؟',
            'answer' => 'الحفرة',
            'points' => 10
            
        ]);

       
    }
    
}