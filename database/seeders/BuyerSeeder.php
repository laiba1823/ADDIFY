<?php

namespace Database\Seeders;

use App\Models\BankAccounts;
use App\Models\Buyer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class BuyerSeeder extends Seeder
{

    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker ;

    /**
     * Create a new seeder instance.
     *
     * @param  \Faker\Generator  $faker
     * @return void
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $buyer = Buyer::factory()->create([
                'name' => 'Buyer ' . $i,
                'email' => 'buyer' . $i . '@example.com',
                'img' => 'storage/img/profile-pictures/default.svg',
                'password' => bcrypt('1234567890'),
                'address' => 'Address ' . $i,
            ]);

            // Create Bank Account for company
            BankAccounts::factory()->create([
                'user_type' => 'buyer',
                'user_id' => $buyer->id,
                'current_balance' => $this->faker->numberBetween(100, 1000), // You can set an initial balance here
            ]);
        }
    }
}
