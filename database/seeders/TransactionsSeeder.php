<?php

namespace Database\Seeders;

use App\Models\Buyer;
use App\Models\Vendor;
use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TransactionsSeeder extends Seeder
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
        for ($i = 1; $i <= 6; $i++) {
            Transactions::factory()->create([
                'number' => $this->faker->unique()->randomNumber(8),
                'from' => Buyer::inRandomOrder()->first()->id,
                'to' => Vendor::inRandomOrder()->first()->id,
                'amount' => $this->faker->randomFloat(2, 10, 200),
                'status' => $this->faker->randomElement(['paid', 'pending', 'cancelled'])
            ]);


        }
    }
}
