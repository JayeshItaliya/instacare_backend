<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('about');
            $table->string('guide');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->string('image');
            $table->string('document')->nullable();
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            DB::table('users')->insert([
                'type' => 1,
                'role' => 'administrator',
                'fname' => 'Super',
                'lname' => 'Admin',
                'phone' => '0123456789',
                'email' => 'superadmin@yopmail.com',
                'password' => Hash::make('12345678'),
                'city' => 'Los Angeles',
                'state' => 'California',
                'country' => 'US',
                'zipcode' => '90001',
                'timezone' => 'America/Los_Angeles',
                'language' => 'English'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
