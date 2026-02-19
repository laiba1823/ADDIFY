<?php

namespace Database\Seeders;

use App\Models\BankAccounts;
use App\Models\Buyer;
use App\Models\Vendor;
use App\Models\Billboard;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class VendorSeeder extends Seeder
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
            $vendor = Vendor::factory()->create([
                'name' => ' vendor ' . $i,
                'img' => "storage/img/profile-pictures/default.svg",
                'email' => 'vendor' . $i . '@example.com',
                'about' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod explicabo rem suscipit, temporibus natus quam nemo minus molestiae at atque architecto dolorem officiis dolorum assumenda voluptatibus amet deserunt itaque optio beatae debitis rerum ab velit. Vitae ipsa dolorum hic libero deserunt? Alias amet voluptatibus commodi praesentium sequi officia quae, nulla ratione, omnis vitae voluptates culpa ullam expedita eveniet doloremque ab voluptatum maiores ea. Inventore, neque tempora minus repellendus atque optio vel totam quas! Eius dolor consequatur vitae commodi accusamus dolores totam id, est pariatur nemo molestias quidem cupiditate suscipit maxime rem odio eveniet. Maxime nisi fugit iste sequi vitae enim.",
                'password' => bcrypt('1234567890'),
            ]);

            // Create Bank Account for Freelancer
            BankAccounts::factory()->create([
                'user_type' => 'vendor',
                'user_id' => $vendor->id,
                'current_balance' => $this->faker->numberBetween(1, 200), // You can set an initial balance here
            ]);

            // Loop to create 5 gigs
            for ($j = 1; $j <= 5; $j++) {
                // Create a new gig
                $billboard = Billboard::create([
                    'vendor_id' => $vendor->id, // Replace with your desired freelancer_id
                    'title' => " Chart Toppers $j",
                    'description' => "Discover the beat with Billboard – your ultimate destination for everything music. From breaking news to exclusive interviews, in-depth analysis, and the hottest chart-toppers, Billboard brings you closer to the heart of the music scene. Whether you're an artist, industry insider, or simply a passionate fan, immerse yourself in the rhythm of the music world with Billboard.",
                    'category_id' => $j, // Replace with your desired category_id
                    'price' => rand(10, 500), // Replace with your desired price logic
                    'images' => [
                        "billboard-images/default/0_I'll be your worker.png",
                        "billboard-images/default/1_I'll be your worker.png",
                        "billboard-images/default/2_I'll be your worker.png",
                        "billboard-images/default/3_I'll be your worker.png",
                        "billboard-images/default/4_I'll be your worker.png",
                    ],
                    'uuid' => Str::uuid(),
                    'status' => "active",
                ]);
            }

            for ($k = 1; $k <= 10; $k++) {
                $buyer = Buyer::pluck('id')->toArray();
                $billboards = Billboard::pluck('id')->toArray();
                Order::create([
                    'vendor_id' => $vendor->id,
                    'buyer_id' => $i,
                    'billboard_id' => $this->getRandomElement($billboards),
                    'description' => "introducing Billboard Musicly – your personalized soundtrack to the world of music! Dive into a universe of hits, trends, and exclusive content curated just for you. With Billboard Musicly, discover new artists, rediscover classics, and stay ahead of the curve with the latest music news and insights. Whether you're jamming out solo or sharing tunes with friends, let Billboard Musicly be your guide to the ultimate musical journey.",
                    "number" => rand(10000000, 99999999),
                    'amount' => rand(100, 200), // Adjust the range as needed
                    'time' => rand(1, 4),
                    'status' => $this->getRandomElement(['completed', 'pending', 'cancelled']),
                ]);
            
            }

        }
    }

    private function getRandomElement(array $array)
    {
        return $array[array_rand($array)];
    }
}
