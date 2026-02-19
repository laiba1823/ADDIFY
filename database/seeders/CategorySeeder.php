<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryData = [
            'Narowal' => 'Narowal, a land steeped in tradition, celebrates its heritage with vibrant festivals and rituals that bring the community together.',
            'Haripur' => 'Haripur, nestled amidst lush greenery, cherishes its cultural diversity through colorful folk dances and traditional music.',
            'Sialkot' => 'Sialkot, known for its craftsmanship, takes pride in its rich history of producing exquisite handcrafted goods and sports equipment.',
            'Lahore' => 'Lahore, the heart of Punjab, captivates visitors with its majestic historical sites, bustling bazaars, and delectable cuisine.',
            'Rawalpindi' => 'Rawalpindi, with its bustling markets and lively streets, embodies the spirit of resilience and hospitality.',
            'Islamabad' => 'Islamabad, the capital city, harmoniously blends modernity with tradition, offering a serene backdrop for cultural exploration.',
            'Multan' => 'Multan, the "City of Saints," exudes spiritual reverence, with its magnificent shrines and centuries-old Sufi traditions.',
            'Kot Addu' => 'Kot Addu, surrounded by fertile plains, embraces agrarian traditions and rural charm, showcasing a simpler way of life.',
            'Thatta' => 'Thatta, with its ancient ruins and architectural marvels, preserves the legacy of bygone eras, inviting visitors to delve into history.',
            'Kot Lak Pat' => 'Kot Lak Pat, with its scenic beauty and tranquil surroundings, offers a peaceful retreat from the hustle and bustle of urban life.',
            'Jhat Pat' => 'Jhat Pat, a haven of natural beauty, captivates with its picturesque landscapes and warm hospitality.',
            'Cheechawatni' => 'Cheechawatni, known for its agricultural heritage, celebrates its farming roots with vibrant festivals and traditional music.'
        ];
        

        foreach ($categoryData as $categoryName => $categoryDescription) {
            Category::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
                'description' => $categoryDescription,
            ]);
        }
        
    }
}
