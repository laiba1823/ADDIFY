<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\BankAccounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
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
        $admin =  Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'img' => '/img/profile-pictures/default.svg',
            'password' => Hash::make('1234567890'),
        ]);

        // Create Bank Account for Admin
        BankAccounts::factory()->create([
            'user_type' => 'admin',
            'user_id' => $admin->id,
            'current_balance' => $this->faker->numberBetween(100, 100000), // You can set an initial balance here
        ]);
    }
}
