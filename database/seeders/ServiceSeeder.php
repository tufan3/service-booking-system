<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Development',
                'description' => 'Complete web application development using modern technologies.',
                'price' => 5000,
                'status' => 'active',
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile application development.',
                'price' => 8000,
                'status' => 'active',
            ],
            [
                'name' => 'UI/UX Design',
                'description' => 'User interface and user experience design services.',
                'price' => 3000,
                'status' => 'active',
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Comprehensive digital marketing and SEO services.',
                'price' => 2000,
                'status' => 'active',
            ],
            [
                'name' => 'Maintenance Service',
                'description' => 'Website and application maintenance service.',
                'price' => 1000,
                'status' => 'inactive',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
