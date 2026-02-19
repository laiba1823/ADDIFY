<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billboard;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BillboardSeeder extends Seeder
{
    public function run()
    {
        // Loop to create 5 gigs
        // for ($i = 1; $i <= 5; $i++) {
        //     // Create a new gig
        //     $gig = Gig::create([
        //         'freelancer_id' => 1, // Replace with your desired freelancer_id
        //         'title' => "Sample Gig $i",
        //         'description' => "<b>This is a sample description for Gig $i. <b>",
        //         'category_id' => $i, // Replace with your desired category_id
        //         'price' => rand(10, 500), // Replace with your desired price logic
        //         'images' => [
        //             "gig-images/default/0_I'll be your worker.png",
        //             "gig-images/default/1_I'll be your worker.png",
        //             "gig-images/default/2_I'll be your worker.png",
        //             "gig-images/default/3_I'll be your worker.png",
        //             "gig-images/default/4_I'll be your worker.png",
        //         ],
        //         'uuid' => Str::uuid(),
        //     ]);
        // }
    }
}
