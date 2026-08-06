<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->foreignId('provider_id')
                ->nullable()
                ->after('service_id')
                ->constrained('users')
                ->nullOnDelete();

        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->dropForeign(['provider_id']);
            $table->dropColumn('provider_id');

        });
    }
};