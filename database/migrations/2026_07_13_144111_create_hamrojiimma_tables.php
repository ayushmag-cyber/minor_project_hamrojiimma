<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // USERS
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        // SERVICES
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->enum('status', ['Available', 'Unavailable'])->default('Available');
            $table->timestamps();
        });

        // BOOKINGS
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('service_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->date('booking_date');
            $table->time('booking_time');
            $table->text('address');

            $table->enum('status', [
                'Pending',
                'Approved',
                'Completed',
                'Cancelled'
            ])->default('Pending');

            $table->timestamps();
        });

        // CONTACT MESSAGES
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->timestamps();
        });

        // REVIEWS
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->tinyInteger('rating');
            $table->text('review');

            $table->timestamps();
        });

        // DEFAULT SERVICES
        DB::table('services')->insert([
            [
                'service_name' => 'Elder Care',
                'description' => 'Professional care for elderly family members.',
                'price' => 2500,
                'image' => 'elder.jpeg',
                'status' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Child Care',
                'description' => 'Professional childcare service.',
                'price' => 2200,
                'image' => 'child.png',
                'status' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Motherhood Care',
                'description' => 'Support for expecting and new mothers.',
                'price' => 3000,
                'image' => 'mother.png',
                'status' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'House Monitoring',
                'description' => 'Home monitoring while you are away.',
                'price' => 1800,
                'image' => 'homemonitoring.png',
                'status' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Event Assistance',
                'description' => 'Professional help during family events.',
                'price' => 3500,
                'image' => 'event.png',
                'status' => 'Available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // DEFAULT ADMIN
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@hamrojiimma.com',
            'phone' => '9800000000',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('services');
        Schema::dropIfExists('users');
    }
};