<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'service_name' => 'Elder Care',
            'description' => 'Professional assistance and companionship for elderly family members.',
            'price' => 2500,
            'image' => 'web.jpg',
            'status' => 1,
        ]);
         Service::create([
            'service_name' => 'Child Care',
            'description' => 'Safe babysitting and supervision for children.',
            'price' => 2000,
            'image' => 'web.jpg',
            'status' => 1,
        ]);
         Service::create([
            'service_name' => 'Motherhood Care',
            'description' => 'Caring support and guidance for expectant mothers.',
            'price' => 4500,
            'image' => 'web.jpg',
            'status' => 1,
        ]);
         Service::create([
            'service_name' => 'Event Assistance',
            'description' => 'Helping hands for family events and celebrations.',
            'price' => 5000,
            'image' => 'web.jpg',
            'status' => 1,
        ]);
         Service::create([
            'service_name' => 'Home Moitorning',
            'description' => 'Home observation services while you are away.',
            'price' => 2500,
            'image' => 'web.jpg',
            'status' => 1,
        ]);
    }
}