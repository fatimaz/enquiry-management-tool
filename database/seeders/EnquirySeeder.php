<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enquiry;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $services = [
            'Strategy & Planning',
            'Operations',
            'HR & People',
            'Finance',
        ];

        $statuses = [
            'new',
            'reviewed',
            'closed',
        ];

        for ($i = 0; $i < 20; $i++) {
            Enquiry::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->optional()->phoneNumber(),
                'service_interest' => fake()->randomElement($services),
                'description' => fake()->paragraph(),
                'status' => fake()->randomElement($statuses),
            ]);
        }
    
        //    Enquiry::create([
        //     'name' => 'Sarah Johnson',
        //     'email' => 'sarah@example.com',
        //     'phone' => '07123456789',
        //     'service_interest' => 'Strategy & Planning',
        //     'description' => 'I would like help improving our business planning process.',
        //     'status' => 'new',
        // ]);

        // Enquiry::create([
        //     'name' => 'Ahmed Ali',
        //     'email' => 'ahmed@example.com',
        //     'phone' => '07129456789',
        //     'service_interest' => 'Finance',
        //     'description' => 'We need advice on managing our company finances.',
        //     'status' => 'reviewed',
        // ]);
    }
}
