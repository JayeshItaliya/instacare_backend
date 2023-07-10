<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['1', '2', '3', '4'])->comment('1=Admin, 2=Instacare Staff, 3=Facility Member, 4=Employee');
            $table->enum('role', ['administrator', 'instacare_staff', 'facility_manager', 'facility_staff', 'front_desk', 'lpn', 'rn', 'cna']);
            $table->integer('facility_id')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zipcode');
            $table->string('timezone');
            $table->string('language');
            $table->string('fcm_token')->nullable();
            $table->string('image')->default('default.jpg');

            $table->enum('status', ['1', '2', '3', '4', '5'])->default('1')->comment('1=Available,2Away,3=Busy,4=DND,5=Offline');
            $table->boolean('is_web_login')->default('0')->comment('0=false,1=true');
            $table->boolean('is_app_login')->default('0')->comment('0=false,1=true');
            $table->boolean('is_login')->default('0')->comment('0=false,1=true');

            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
